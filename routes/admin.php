<?php

use App\Http\Controllers\AttributesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')->middleware(['auth', 'check_admin'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users');
        Route::get('/edit_user/{user}', 'edit')->name('admin.edit_user');
        Route::put('/update_user/{id}', 'update')->name('admin.update_user');
    });

    Route::controller(CategoriesController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.categories');
        Route::get('/ajax_get_subcategories/{id}', 'ajax_get_subcategories');
        Route::get('/create_category', 'create')->name('admin.create_category');
        Route::get('/edit_category/{category}', 'edit')->name('admin.edit_category');
        Route::post('/store_category', 'store')->name('admin.store_category');
        Route::put('/update_category/{id}', 'update')->name('admin.update_category');
        Route::post('/delete_category', 'delete')->name('admin.delete_category');
    });

    Route::controller(AttributesController::class)->group(function () {
        Route::get('/attributes', 'index')->name('admin.attributes');
        Route::get('/create_attribute', 'create')->name('admin.create_attribute');
        Route::get('/edit_attribute/{attribute}', 'edit')->name('admin.edit_attribute');
        Route::post('/store_attribute', 'store')->name('admin.store_attribute');
        Route::put('/update_attribute/{id}', 'update')->name('admin.update_attribute');
        Route::post('/delete_attribute', 'delete')->name('admin.delete_attribute');
    });


    Route::controller(ProductsController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/create_product', 'create')->name('admin.create_product');
        Route::get('/edit_product/{product}', 'edit')->name('admin.edit_product');
        Route::post('/store_product', 'store')->name('admin.store_product');
        Route::put('/update_product/{id}', 'update')->name('admin.update_product');
        Route::post('/store_product_images/{id}', 'upload_images')->name('admin.store_product_images');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('admin.orders');
        Route::get('/edit_order/{order}', 'edit')->name('admin.edit_order');
        Route::put('/update_order/{id}', 'update')->name('admin.update_order');
    });
});
