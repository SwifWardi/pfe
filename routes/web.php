<?php

use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShopController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/account/{id?}', 'index')->name('show.profile');  
    });
});

Route::controller(HomeController::class)->group(function () {
Route::get('/', 'index')->name('home'); 
Route::get('/wishlist', 'wishlistPage')->name('wishlist.page'); 
Route::get('/vendors', 'vendorList')->name('vendor.list');
Route::get('/vendor/{id}', 'vendorDetails')->name('vendor.details'); 
Route::get('/product/{id}', 'productPage')->name('product.page'); 
});

Route::controller(AboutController::class)->group(function () { 
    Route::get('/about', 'index')->name('about.page');
});

Route::controller(ShopController::class)->group(function () { 
    Route::get('/shop', 'index')->name('shop.page');
});

Route::controller(ContactController::class)->group(function () { 
    Route::get('/contact', 'index')->name('contact.page');
});

Route::controller(CheckoutController::class)->group(function () { 
    Route::get('/checkout', 'index')->name('checkout.page');
});

Route::controller(CartController::class)->group(function () { 
    Route::get('/cart', 'index')->name('cart.page');
});



