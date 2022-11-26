<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded b
y the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/
//shop
Route::get('','App\Http\Controllers\ShopController@index');
Route::get('product-details/{id}','App\Http\Controllers\ShopController@product_details');
Route::get('cate-products/{id}','App\Http\Controllers\ShopController@cate_products');
Route::get('genre-products/{id}','App\Http\Controllers\ShopController@genre_products');
Route::post('search','App\Http\Controllers\ShopController@search');

//rate
Route::post('add-rate','App\Http\Controllers\RateController@add_rate');

//cart
Route::get('cart','App\Http\Controllers\CartController@index');
Route::post('cart','App\Http\Controllers\CartController@index');
Route::post('add-to-cart','App\Http\Controllers\CartController@add');
Route::post('cart-edit-count','App\Http\Controllers\CartController@edit_count');
Route::get('cart-delete/{id}','App\Http\Controllers\CartController@delete');
Route::post('add-order','App\Http\Controllers\CartController@add_order');
Route::get('orders','App\Http\Controllers\CartController@orders');
Route::get('order-details/{id}','App\Http\Controllers\CartController@order_details');

//customer
Route::get('customer','App\Http\Controllers\CustomerController@index');
Route::get('customer-login','App\Http\Controllers\CustomerController@login');
Route::get('customer-logout','App\Http\Controllers\CustomerController@logout');
Route::post('customer-login-test','App\Http\Controllers\CustomerController@login_test');
Route::post('customer-signup','App\Http\Controllers\CustomerController@signup');
Route::post('customer-edit','App\Http\Controllers\CustomerController@edit');
//order
Route::get('admin/orders','App\Http\Controllers\OrderController@index');
Route::get('admin/order-transport','App\Http\Controllers\OrderController@transport');
Route::get('admin/order-completed','App\Http\Controllers\OrderController@completed');
Route::get('admin/order-comfim/{id}','App\Http\Controllers\OrderController@comfim');
Route::get('admin/order-delete/{id}','App\Http\Controllers\OrderController@delete');
Route::get('admin/order-details/{id}','App\Http\Controllers\OrderController@details');

//admin
Route::get('admin','App\Http\Controllers\AdminController@index');
Route::get('admin-login','App\Http\Controllers\AdminController@login');
Route::get('admin-logout','App\Http\Controllers\AdminController@logout');
Route::post('admin-login-test','App\Http\Controllers\AdminController@login_test');
Route::get('admin-manage','App\Http\Controllers\AdminController@manage');
Route::get('admin-add','App\Http\Controllers\AdminController@add');
Route::post('admin-add-admin','App\Http\Controllers\AdminController@add_admin');
Route::get('admin-delete/{id}','App\Http\Controllers\AdminController@delete');
Route::get('admin-edit/{id}','App\Http\Controllers\AdminController@edit');
Route::post('admin-edit-admin','App\Http\Controllers\AdminController@edit_admin');

//genre
Route::get('admin/genre-manage','App\Http\Controllers\GenreController@manage');
Route::get('admin/genre-add','App\Http\Controllers\GenreController@add');
Route::post('admin/genre-add-genre','App\Http\Controllers\GenreController@add_genre');
Route::get('admin/genre-delete/{id}','App\Http\Controllers\GenreController@delete');
Route::get('admin/genre-recover/{id}','App\Http\Controllers\GenreController@recover');
Route::get('admin/genre-deletedb/{id}','App\Http\Controllers\GenreController@deletedb');
Route::get('admin/genre-edit/{id}','App\Http\Controllers\GenreController@edit');
Route::post('admin/genre-edit-genre','App\Http\Controllers\GenreController@edit_genre');

//cate
Route::get('admin/cate-manage','App\Http\Controllers\CategoryController@manage');
Route::get('admin/cate-add','App\Http\Controllers\CategoryController@add');
Route::post('admin/cate-add-cate','App\Http\Controllers\CategoryController@add_cate');
Route::get('admin/cate-delete/{id}','App\Http\Controllers\CategoryController@delete');
Route::get('admin/cate-recover/{id}','App\Http\Controllers\CategoryController@recover');
Route::get('admin/cate-deletedb/{id}','App\Http\Controllers\CategoryController@deletedb');
Route::get('admin/cate-edit/{id}','App\Http\Controllers\CategoryController@edit');
Route::post('admin/cate-edit-cate','App\Http\Controllers\CategoryController@edit_cate');
//coupon
Route::get('admin/coupon-manage','App\Http\Controllers\CouponController@manage');
Route::get('admin/coupon-add','App\Http\Controllers\CouponController@add');
Route::post('admin/coupon-add-coupon','App\Http\Controllers\CouponController@add_coupon');
Route::get('admin/coupon-delete/{id}','App\Http\Controllers\CouponController@delete');
Route::get('admin/coupon-recover/{id}','App\Http\Controllers\CouponController@recover');
Route::get('admin/coupon-deletedb/{id}','App\Http\Controllers\CouponController@deletedb');
Route::get('admin/coupon-edit/{id}','App\Http\Controllers\CouponController@edit');
Route::post('admin/coupon-edit-coupon','App\Http\Controllers\CouponController@edit_coupon');

//customer
Route::get('admin/customer-manage','App\Http\Controllers\CustomerController@manage');
Route::get('admin/customer-add','App\Http\Controllers\CustomerController@add');
Route::get('admin/customer-delete/{id}','App\Http\Controllers\CustomerController@delete');
Route::get('admin/customer-recover/{id}','App\Http\Controllers\CustomerController@recover');
Route::get('admin/customer-deletedb/{id}','App\Http\Controllers\CustomerController@deletedb');

//rate
Route::get('admin/rate-manage','App\Http\Controllers\RateController@manage');
Route::get('admin/rate-add','App\Http\Controllers\RateController@add');
Route::get('admin/rate-delete/{id}','App\Http\Controllers\RateController@delete');
Route::get('admin/rate-recover/{id}','App\Http\Controllers\RateController@recover');
Route::get('admin/rate-deletedb/{id}','App\Http\Controllers\RateController@deletedb');
//product
Route::get('admin/product-manage','App\Http\Controllers\ProductController@manage');
Route::get('admin/product-add','App\Http\Controllers\ProductController@add');
Route::post('admin/product-add-product','App\Http\Controllers\ProductController@add_product');
Route::get('admin/product-delete/{id}','App\Http\Controllers\ProductController@delete');
Route::get('admin/product-recover/{id}','App\Http\Controllers\ProductController@recover');
Route::get('admin/product-deletedb/{id}','App\Http\Controllers\ProductController@deletedb');
Route::get('admin/product-edit/{id}','App\Http\Controllers\ProductController@edit');
Route::post('admin/product-edit-product','App\Http\Controllers\ProductController@edit_product');












