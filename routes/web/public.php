<?php

use App\Http\Controllers\BiddingController;
use App\Http\Controllers\DefaultProductController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(DefaultProductController::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/products', 'index')->name('default.products');
    Route::get('/product/{product}', 'show')->name('default.products.show');
    Route::post('/product/filter', [FilterController::class, 'filterProduct']);
    Route::get('/bid/{id}', [BiddingController::class, 'fetch']);

    Route::post('/get-in-touch', [GetInTouchController::class, 'store']);
});