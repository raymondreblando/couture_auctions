<?php

use App\Http\Controllers\BiddingController;
use App\Http\Controllers\BidHistoryController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role.verify:user'])->group(function () {
    Route::get('/bid-history', BidHistoryController::class)->name('history');
    Route::get('/notification/{notification}', NotificationController::class)->name('notification');

    Route::controller(BiddingController::class)->group(function () {
        Route::post('/bid', 'store');
        Route::delete('/bid/{id}', 'destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::put('/profile/update', 'update');
        Route::put('/password/change', 'changePassword');
    });

    Route::controller(IdentityController::class)->group(function () {
        Route::post('/identity/upload', 'store');
    });
});