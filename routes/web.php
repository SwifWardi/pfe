<?php

use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\frontend\HomeController;
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
Route::get('/product/{id}', 'productPage')->name('product.page'); 
});



