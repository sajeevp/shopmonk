<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductPages extends Controller
{
    public function catPage(Request $request, $main_cat)
    {
        $products = [];
        $cat_ids = [];
        $categories = Categories::all();
        $cats = $categories->where('slug', $main_cat)->first()->subcategories;
        if ($request->sub_cat) {
            $cat_ids = $categories->where('slug', $request->sub_cat)->pluck('id');
        } else {
            $cat_ids = $cats->pluck('id');
        }
        $products = Products::Ofcat($cat_ids)->paginate(15);
        return view('frontend.products.category-page', ['main_cat' => $main_cat, 'cats' => $cats, 'products' => $products]);
    }

    public function searchPage(Request $request)
    {
        $products = Products::query()->whereFullText('name', $request->text)->paginate(20);
        //return $products;
        return view('frontend.products.search-page', ['products' => $products]);
    }

    public function addToCart($id)
    {
        $product = Products::findOrFail($id);
        $product_img = $product->productImages()->first();
        $cart = session()->get('cart', []);

        if ($product->stock_quantity > 0) {
            if (isset($cart[$id])) {
                if ($cart[$id]["quantity"] < $product->stock_quantity) {
                    $cart[$id]["quantity"]++;
                } else {
                    return redirect()->back()->with('error', 'Sorry the product reached its maximum stock!');
                }
            } else {
                $cart[$id] = [
                    "name" => $product->name,
                    "slug" => $product->slug,
                    "image" => $product_img ? $product_img->file_name : '',
                    "quantity" => 1,
                    "regular_price" => $product->regular_price,
                    "selling_price" => $product->selling_price,
                    "currency_code" => $product->currency_code
                ];
            };
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {
            return redirect()->back()->with('error', 'Sorry the product is out of stock!');
        }
    }

    public function minusFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]["quantity"]--;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed successfully!');
    }
}
