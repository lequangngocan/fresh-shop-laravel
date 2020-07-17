<?php

use Illuminate\Support\Facades\Route;
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

// Trang chủ
Route::get('/','Controller@index');

// Tim kiếm
Route::get('/search', 'ProductController@search');

// Danh sách sản phẩm
Route::get('/product','ProductController@list')->name('product');

// Chi tiết công ty
Route::get('/about','Controller@about');

// Hiển thị sản phẩm theo danh mục
Route::get('/category/{id}','CategoryController@show');

// Chi tiết sản phẩm
Route::get('/product-detail/{id}','ProductController@detail');

// Bình luận
Route::post('/comment/userID={userID}&productID={productID}', 'CommentController@comment');

// Liên hệ
Route::get('/contact','ContactController@formContact');
Route::post('/contact','ContactController@store');

// Bài viết
Route::get('/blog','BlogController@listNews');
Route::get('/blog-detail/{id}','BlogController@show');

// Giỏ hàng
Route::get('/view-cart','CartController@index');
Route::get('/add-cart/{id}', 'CartController@addCart');
Route::get('/remove-cart/{rowId}', 'CartController@remove');
Route::get('/update-cart','CartController@update');

// Mã giảm giá
Route::get('/check-coupon','CouponController@checkCoupon');

// Thanh toán
Route::get('/checkout','Controller@checkout');

// Đăng nhập admin
Route::get('/login-back-end','Controller@loginBackend');
Route::post('/login-back-end','Controller@postLoginBackend');

// Đăng xuất
Route::get('/logout-back-end', 'Controller@logoutBackend');
Route::get('/logout-front-end', 'Controller@logoutFrontend');

// Đăng nhập
Route::get('/login-front-end', 'Controller@loginFrontend');
Route::post('/login-front-end','Controller@postLoginFrontend');

// Quên mật khẩu
Route::get('/forgot-password','Controller@forgotPassword');
Route::post('/forgot-password','Controller@forgot');
Route::get('/change-password','Controller@changePassword')->name('changePassword');
Route::post('/change-password','Controller@postChangePassword');

// Đăng ký
Route::get('/register-front-end', 'RegisterController@index');
Route::post('/register-front-end', 'RegisterController@store');

// Admin
Route::group(['prefix'=>'back-end', 'middleware' => 'backend'], function(){
    Route::get('/dashboard', 'Controller@dashboard');

    // quản lí danh mục
    Route::get('/list-category','CategoryController@index');
    Route::get('/add-category','CategoryController@add');
    Route::post('/add-category','CategoryController@store');
    Route::get('/edit-category/{id}','CategoryController@edit');
    Route::post('/edit-category/{id}','CategoryController@update')->name('updateCategory');
    Route::get('/delete-category/{categoryID}', 'CategoryController@destroy');

    // quản lí sản phẩm
    Route::get('/list-product','ProductController@index');
    Route::get('/add-product','ProductController@add');
    Route::post('/add-product','ProductController@store');
    Route::get('/edit-product/{id}','ProductController@edit');
    Route::post('/edit-product/{id}','ProductController@update')->name('post_edit_sp');
    Route::get('/delete-product/{id}','ProductController@destroy');

    // quản lí tài khoản
    Route::get('/list-user','UserController@index');
    Route::get('/list-user/{id}','UserController@update');
    Route::get('/add-user','UserController@add');
    Route::post('/add-user','UserController@store');
    Route::get('/edit-user','UserController@editx');
    Route::get('/delete-user/{id}', 'UserController@destroy');

    // quản lí mã giảm giá
    Route::get('/list-coupon','CouponController@index');
    Route::get('/add-coupon','CouponController@add');
    Route::post('/add-coupon','CouponController@insertDB');
    Route::get('/edit-coupon/{id}','CouponController@edit');
    Route::post('/edit-coupon/{id}','CouponController@update');
    Route::get('/delete-coupon/{id}', 'CouponController@destroy');

    // quản lí slide
    Route::get('/list-slide','SliderController@index');
    Route::get('/list-slide/{id}','SliderController@change');
    Route::get('/add-slide','SliderController@add');
    Route::post('/add-slide','SliderController@store');
    Route::get('/edit-slide/{id}','SliderController@edit');
    Route::post('/edit-slide/{id}','SliderController@update');
    Route::get('/delete-slide/{id}', 'SliderController@destroy');

    // quản lí tin tức
    Route::get('/list-blog','BlogController@index');
    Route::get('/add-blog','BlogController@add');
    Route::post('/add-blog','BlogController@store');
    Route::get('/edit-blog/{id}','BlogController@edit');
    Route::post('/edit-blog/{id}','BlogController@update');
    Route::get('/delete-blog/{id}', 'BlogController@destroy');

    // quản lí khách vãng lai
    Route::get('/customer','CustomerController@index');

    // quản lí bình luận
    Route::get('/comment','CommentController@index');
    Route::get('/delete-comment/{id}','CommentController@destroy');

    // quản lí đặt hàng
    Route::get('/order','OrderController@index');

    // quản lí liên hệ
    Route::get('/contact','ContactController@index');
    Route::get('/delete-contact/{id}','ContactController@destroy');

    // quản lí giới thiệu
    Route::get('/setting','SettingController@index');
    Route::get('/edit-setting','SettingController@editx');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');