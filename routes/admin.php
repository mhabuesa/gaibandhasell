<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomizeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    //StoreController
    Route::controller(StoreController::class)->group(function(){
        Route::get('/stores', 'stores')->name('stores');
        Route::get('/add_store', 'add_store')->name('add.store');
        Route::post('/store_add', 'store_add')->name('store.add');
        Route::get('/store_status/{id}', 'store_status')->name('store.status');
        Route::get('/delete_store/{id}', 'delete_store')->name('delete.store');
        Route::get('/store_details/{id}', 'store_details')->name('store.details');
        Route::get('/store_edit/{id}', 'store_edit')->name('stores.edit');
        Route::post('/store_update/{id}', 'stores_update')->name('stores.update');
    });

    //ProfileController
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/profile/setting', 'profile_setting')->name('profile.setting');
        Route::post('/profile/settings/update', 'profile_settings_update')->name('profile.settings.update');
        Route::get('/profile/security', 'profile_security')->name('profile.security');
        Route::post('/profile/security/update', 'profile_security_update')->name('profile.security.update');
    });

    //VendorController
    Route::controller(SellerController::class)->group(function(){
        Route::get('/sellers', 'sellers')->name('sellers');
        Route::get('/seller_edit/{id}', 'seller_edit')->name('seller.edit');
        Route::post('/seller_update/{id}','seller_update')->name('seller.update');
        Route::get('/seller_delete/{id}', 'seller_delete')->name('seller.delete');
    });

    //UserController
    Route::controller(UserController::class)->group(function(){
        Route::get('/users', 'users')->name('users');
        Route::get('/add_user','add_user')->name('add.user');
        Route::post('/user_store', 'user_store')->name('user.store');
        Route::get('/user_edit/{id}','user_edit')->name('user.edit');
        Route::post('/user_update/{id}','user_update')->name('user.update');
        Route::get('/user_delete/{id}', 'user_delete')->name('user.delete');
    });

    //ProductController
    Route::controller(ProductController::class)->group(function(){
        Route::get('/addProduct','add_product')->name('add.product');
        Route::post('/product_store','product_store')->name('product.store');
        Route::get('/allProduct','all_product')->name('all.product');
        Route::get('/editProduct/{id}','edit_product')->name('edit.product');
        Route::get('/galleryImgDelete/{id}','gall_delete')->name('gall.delete');
        Route::post('/update_product/{id}','update_product')->name('update.product');
        Route::get('/productDelete/{id}','product_delete')->name('product.delete');
    });

    //InventoryController
    Route::controller(InventoryController::class)->group(function(){
        Route::get('/inventory/{id}','inventory')->name('inventory');
        Route::post('/inventory/store/{id}','inventory_store')->name('inventory.store');
        Route::get('/inventoryDelete/{id}','inventory_delete')->name('inventory.delete');
    });

    //CategoryController
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categories','category')->name('categories');
        Route::post('/category_store', 'category_store')->name('category.store');
        Route::post('/category_status/{id}', 'category_status')->name('category.status');
        Route::get('/category_edit/{id}','category_edit')->name('category.edit');
        Route::post('/category_update/{id}','category_update')->name('category.update');
        Route::get('/category_delete/{id}', 'category_delete')->name('category.delete');
    });

    //BrandsController
    Route::controller(BrandController::class)->group(function(){
        Route::get('/brands','brands')->name('brands');
        Route::post('/brand_store', 'brand_store')->name('brand.store');
        Route::get('/brand_edit/{id}','brand_edit')->name('brand.edit');
        Route::post('/brand_update/{id}','brand_update')->name('brand.update');
        Route::get('/brand_delete/{id}', 'brand_delete')->name('brand.delete');
    });

    //AttributeController
    Route::controller(AttributeController::class)->group(function(){
        Route::get('/attributes','attributes')->name('attributes');
        Route::post('/size_store','size_store')->name('size.store');
        Route::post('/size_update/{id}','size_update')->name('size.update');
        Route::get('/size_delete/{id}', 'size_delete')->name('size.delete');
        Route::post('/color_store', 'color_store')->name('color.store');
        Route::get('/color_delete/{id}', 'color_delete')->name('color.delete');
        Route::post('/color_update/{id}','color_update')->name('color.update');
    });

    //PayoutController
    Route::controller(PayoutController::class)->group(function(){
        Route::get('/payoutsList','payouts_list')->name('payouts.list');
        Route::get('/payoutRequest','payout_request')->name('payout.request');
        Route::get('/payout/{id}','payout')->name('payout');
        Route::get('/payoutReject/{id}','payout_reject')->name('payout.reject');
        Route::get('/rejectedPayout','rejected_payout')->name('rejected.payout');
    });

    //CustomizeController
    Route::controller(CustomizeController::class)->group(function(){

        Route::get('/shortText','shortText')->name('shortText');
        Route::post('/shortText/store','shortText_store')->name('shortText.store');
        Route::post('/shortText/update/{id}','shortText_update')->name('shortText.update');
        Route::post('/shortText/status/{id}','shortText_status')->name('shortText.status');
        Route::get('/shortText/delete/{id}','shortText_delete')->name('shortText.delete');

        Route::get('/logo','logo')->name('logo');
        Route::post('/mainLogo/update','mainLogo_update')->name('mainLogo.update');
        Route::post('/footerLogo/update','footerLogo_update')->name('footerLogo.update');

        Route::get('/contactInfo','contactInfo')->name('contactInfo');
        Route::post('/contactInfo/update','contactInfo_update')->name('contactInfo.update');

        Route::get('/banner','banner')->name('banner');
        Route::post('/banner/store','banner_store')->name('banner.store');
        Route::get('/banner/edit/{id}','banner_edit')->name('banner.edit');
        Route::post('/banner/update/{id}','banner_update')->name('banner.update');
        Route::post('/banner/status/{id}','banner_status')->name('banner.status');
        Route::get('/banner/delete/{id}','banner_delete')->name('banner.delete');


    });


});
