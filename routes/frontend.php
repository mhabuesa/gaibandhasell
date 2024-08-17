<?php

use App\Http\Controllers\AuthFrontendController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;


Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/category/{slug}', 'category')->name('category');
    Route::get('/product/{slug}', 'product')->name('product');
});

// AuthFrontendController
Route::controller(AuthFrontendController::class)->group(function(){
    Route::get('/signin', 'signin')->name('signin');
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/user/register', 'customer_register')->name('customer.register');
    Route::get('/signOut', 'sign_out')->name('signOut');
    Route::post('/user/signin', 'customer_signin')->name('customer.signin');
    Route::get('/forgetPass', 'forgetPass')->name('forgetPass');
    Route::post('/forgetPass/mail', 'forgetPass_mail')->name('forgetPass.mail');
    Route::get('/pass/change/{uniqid}', 'pass_change')->name('pass.change');
    Route::post('/pass/update/{uniqid}', 'pass_update')->name('pass.update');
});

Route::middleware('customer')->group(function(){
    Route::controller(CustomerProfileController::class)->group(function(){
        Route::get('/user/dashboard', 'customer_dashboard')->name('customer.dashboard');
        Route::get('/user/wishlist', 'customer_wishlist')->name('customer.wishlist');
        Route::get('/user/order', 'customer_order')->name('customer.order');
        Route::get('/user/profile', 'customer_profile')->name('customer.profile');
        Route::get('/user/setting', 'customer_setting')->name('customer.setting');

        Route::post('/user/photo/update', 'customer_photo_update')->name('customer.photo.update');
        Route::post('/user/info/update', 'customer_info_update')->name('customer.info.update');
        Route::post('/user/security/update', 'customer_security_update')->name('customer.security.update');
    });
    Route::controller(CartController::class)->group(function(){
        Route::get('/cart', 'cart')->name('cart');
        Route::post('/getSize', 'getSize');
        Route::post('/cart/store/{id}', 'cart_store')->name('cart.store');
        Route::get('/cart/delete/{id}', 'cart_delete')->name('cart.delete');
        Route::post('/update-cart-quantity','updateCartQuantity')->name('cart.update.quantity');
        Route::post('/delete-cart-item', 'deleteCartItem')->name('cart.delete.item');

    });

    Route::controller(CheckoutController::class)->group(function(){
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/get_upazila', 'get_upazila')->name('get.upazila');
    });
});

