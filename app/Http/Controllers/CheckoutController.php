<?php

namespace App\Http\Controllers;

use Exception;
use Razorpay\Api\Api;
use App\Models\Orders;
use App\Mail\OrderMail;
use App\Models\Address;
use App\Models\Products;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrdersFormRequest;

class CheckoutController extends Controller
{

    public function proceed(OrdersFormRequest $request)
    {
        $validatedData = $request->validated();

        $address = Auth::user()->userAddress;

        if ($address) {
            $address->address_1 = $validatedData['address_1'];
            $address->address_2 = $validatedData['address_2'];
            $address->state = $validatedData['state'];
            $address->country = $validatedData['country'];
            $address->postcode = $validatedData['postcode'];
            $address->phone = $validatedData['phone'];

            $address->save();
        } else {
            $address = new Address();
            $address->user_id = Auth::user()->id;
            $address->address_1 = $validatedData['address_1'];
            $address->address_2 = $validatedData['address_2'];
            $address->state = $validatedData['state'];
            $address->country = $validatedData['country'];
            $address->postcode = $validatedData['postcode'];
            $address->phone = $validatedData['phone'];

            $address->save();
        }

        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->name = $validatedData['name'];
        $order->email = $validatedData['email'];
        $order->sub_total = $request->sub_total;
        $order->total = $request->sub_total;
        $order->payment_method = 'NA';
        $order->payment_id = '00000';

        $order->save();

        $cart = session()->get('cart');

        foreach ($cart as
            $key => $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $key,
                'price' => $item['selling_price'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect(route('order.payment', ['id' => $order->id]));
    }

    public function payment($id)
    {
        $order = Orders::findOrFail($id);
        if (Auth::user()->id == $order->user_id && $order->status == '0') {
            foreach ($order->orderitems as $item) {
                if ($item->itemProduct->stock_quantity < $item->quantity) {
                    return redirect()->back()->with('error', "This order cannot be processed !");
                };
            }
            return view('frontend.shop.payment-page', ['order' => $order]);
        } else {
            return redirect('dashboard');
        }
    }

    public function complete(Request $request)
    {
        $input = $request->all(); 

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        $order = Orders::findOrFail($request->order);
        $order->payment_method = 'Razorpay';
        $order->status = '1';
        $order->payment_id = $input['razorpay_payment_id'];
        $order->save();
        return redirect()->back()->with('success', 'Payment successful');
    }

}
