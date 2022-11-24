<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function view()
    {
        $cart = session()->get('cart');
        //return $cart;
        $cart_new = [];
        if ($cart) {
            $cart_new = Arr::map($cart, function ($value, $key) {
                $product = Products::findOrFail($key);
                if ($value['quantity'] > $product->stock_quantity) {
                    $subtotal = 0;
                } else {
                    $subtotal = $value['quantity'] * $value['selling_price'];
                }
                $array = Arr::add($value, 'subtotal', $subtotal);
                return $array;
            });
        }
        //return $cart;
        return view('frontend.shop.cart-page', ['cart' => (array)$cart_new]);
    }

    public function checkout()
    {
        $cart = session()->get('cart');
        $user = Auth::user();

        $cart_new = [];
        if ($cart) {
            $cart_new = Arr::map($cart, function ($value, $key) {
                $product = Products::findOrFail($key);
                if ($value['quantity'] > $product->stock_quantity) {
                    $subtotal = 0;
                } else {
                    $subtotal = $value['quantity'] * $value['selling_price'];
                }
                $array = Arr::add($value, 'subtotal', $subtotal);
                return $array;
            });
            return view('frontend.shop.checkout-page', ['cart' => (array)$cart_new, 'user' => $user]);
        } else {
            return redirect('/');
        }
    }
}
