<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_category','App\Http\Controllers\ApiController@get_category')->name('get_category');
Route::get('/get_subcategory/{cat_id}','App\Http\Controllers\ApiController@get_subcategory')->name('get_subcategory');
Route::get('/get_inventory','App\Http\Controllers\ApiController@get_inventory')->name('get_inventory');
Route::get('/get_blog','App\Http\Controllers\ApiController@get_blog')->name('get_blog');
Route::get('get_products/{id}','App\Http\Controllers\ApiController@get_products')->name('get_products');
Route::get('/get_agent','App\Http\Controllers\ApiController@get_agent')->name('get_agent');
Route::get('/get_slider','App\Http\Controllers\ApiController@get_slider')->name('get_slider');
Route::get('/get_slider1','App\Http\Controllers\ApiController@get_slider1')->name('get_slider1');
Route::get('/get_advertisement','App\Http\Controllers\ApiController@get_advertisement')->name('get_advertisement');
Route::get('/get_topbrands','App\Http\Controllers\ApiController@get_topbrands')->name('get_topbrands');
Route::post('/post_signup','App\Http\Controllers\ApiController@post_signup')->name('post_signup');
Route::get('/product_detail','App\Http\Controllers\ApiController@product_detail')->name('product_detail');
Route::get('/get_productss/{id}','App\Http\Controllers\ApiController@get_productss')->name('get_productss');
Route::get('/get_state_name','App\Http\Controllers\ApiController@get_state_name')->name('get_state_name');
Route::get('category/{id}',[CategoryController::class,'getCategorys']);
Route::get('get_subcategory/{id}',[SubCategoryController::class,'get_subcategory']);
Route::get('/get_subcategorys','App\Http\Controllers\ApiController@get_subcategorys')->name('get_subcategorys');
Route::get('search/{key}',[ProductController::class,'search']);
Route::get('products/{id}',[ProductController::class,'productget']);
Route::get('/get_brand','App\Http\Controllers\ApiController@get_brand')->name('get_brand');
Route::get('/featured_products','App\Http\Controllers\ApiController@featured_products')->name('featured_products');
Route::post('/user_register','App\Http\Controllers\ApiController@user_register')->name('user_register');
Route::post('/related_products','App\Http\Controllers\ApiController@related_products')->name('related_products');
Route::post('/verify_otp','App\Http\Controllers\ApiController@verify_otp')->name('verify_otp');
Route::post('/user_login','App\Http\Controllers\ApiController@user_login')->name('user_login');
Route::post('/verify_user_otp','App\Http\Controllers\ApiController@verify_user_otp')->name('verify_user_otp');
Route::post('/add_to_cart','App\Http\Controllers\ApiController@add_to_cart')->name('add_to_cart');
Route::get('/cart_data','App\Http\Controllers\ApiController@cart_data')->name('cart_data');
Route::post('/add_address','App\Http\Controllers\ApiController@add_address')->name('add_address');
Route::post('/address_list','App\Http\Controllers\ApiController@address_list')->name('address_list');
Route::get('/promocode_list','App\Http\Controllers\ApiController@promocode_list')->name('promocode_list');
Route::post('/my_orders','App\Http\Controllers\ApiController@my_orders')->name('my_orders');
Route::post('/cancel_order','App\Http\Controllers\ApiController@cancel_order')->name('cancel_order');
Route::post('/delete_product_cart','App\Http\Controllers\ApiController@delete_product_cart')->name('delete_product_cart');
Route::post('/update_cart','App\Http\Controllers\ApiController@update_cart')->name('update_cart');
Route::post('/checkout','App\Http\Controllers\ApiController@checkout')->name('checkout');
Route::post('/home_product_cart','App\Http\Controllers\ApiController@home_product_cart')->name('home_product_cart');
Route::post('/my_orders_details','App\Http\Controllers\ApiController@my_orders_details')->name('my_orders_details');
Route::post('/calculate','App\Http\Controllers\ApiController@calculate')->name('calculate');
Route::post('/user_profile','App\Http\Controllers\ApiController@user_profile')->name('user_profile');
Route::post('/search_list','App\Http\Controllers\ApiController@search_list')->name('search_list');
Route::post('/check_payment','App\Http\Controllers\ApiController@check_payment')->name('check_payment');
Route::get('/cart_count','App\Http\Controllers\ApiController@cart_count')->name('cart_count');
Route::post('/update_token','App\Http\Controllers\ApiController@update_token')->name('update_token');
Route::get('/app_version','App\Http\Controllers\ApiController@app_version')->name('app_version');
Route::post('/admin_login_check','App\Http\Controllers\ApiController@admin_login_check')->name('admin_login_check');
Route::post('/admin_notification','App\Http\Controllers\ApiController@admin_notification')->name('admin_notification');

// Route::group(['middleware' => ['auth:api']], function () {
// Route::get('/admin_login','App\Http\Controllers\ApiController@admin_login')->name('admin_login');
// });



Route::group(['middleware' => 'auth:api'], function () {
	Route::post('/users', 'BackendController@details')->middleware('cors');


});
Route::post('register',[AuthenticationController::class,'register']);

Route::post('login',[AuthenticationController::class,'login']);
