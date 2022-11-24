<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Orders::paginate(15);
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function view($id)
    {
        $order = Orders::findOrFail($id);
        if (Auth::user()->role == '1') {
            return view('admin.orders.view', ['order' => $order]);
        } else {
            return view('frontend.shop.view-order', ['order' => $order]);
        }
    }

    public function edit(Orders $order)
    {
        return view('admin.orders.edit', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        $order->status = $request->status;
        $order->shipping_info = $request->shipping_info;

        $order->save();

        return redirect('admin/orders')->with('success', 'Order updated !');
    }

    public function cancel($id)
    {
        $order = Orders::findOrFail($id);
        if ($order->status == '0' || $order->status == '1') {
            $order->status = '4';
            $order->save();
            return redirect('dashboard')->with('success', 'Your order calcelled successfully !');
        } else {
            return redirect('dashboard')->with('error', 'Your order cannot be calcelled !');
        }
    }
}
