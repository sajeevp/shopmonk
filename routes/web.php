<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductPages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about');

Route::get('/services', function () {
    return view('frontend.pages.services');
})->name('services');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');

Route::controller(ProductPages::class)->group(function () {
    Route::get('/search', 'searchPage')->name('search.page');
    Route::get('/category/{main_cat}/{sub_cat?}', 'catPage')->name('category.page');
    Route::get('/product/{slug}', 'productPage')->name('product.page');
    Route::get('/product/addtocart/{id}', 'addToCart')->name('product.addtocart');
    Route::get('/product/minusfromcart/{id}', 'minusFromCart')->name('product.minusfromcart');
    Route::get('/product/removefromcart/{id}', 'removeFromCart')->name('product.removefromcart');
});

Route::get('/dashboard', [DashboardController::class, 'redirect'])->name('dashboard');

Route::get('/cart', [CartController::class, 'view'])->name('cart');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/order/proceed', [CheckoutController::class, 'proceed'])->name('order.proceed');
    Route::get('/order/payment/{id}', [CheckoutController::class, 'payment'])->name('order.payment');
    Route::post('/order/complete', [CheckoutController::class, 'complete'])->name('order.complete');
    Route::get('/order/view/{id}', [OrderController::class, 'view'])->name('order.view');
    Route::get('/order/cancel/{id}', [OrderController::class, 'cancel'])->name('order.cancel');
});




require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
