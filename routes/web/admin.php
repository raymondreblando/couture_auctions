<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role.verify:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        Route::controller(AccountController::class)->group(function () {
            Route::get('/accounts', 'index')->name('accounts');
            Route::put('/account/{id}', 'updateStatus');
        });

        Route::controller(IdentityController::class)->group(function () {
            Route::get('/identity/{user}', 'show')->name('identity');
            Route::delete('/identity/reject/{id}', 'reject');
            Route::put('/identity/verify/{id}', 'verify');
        });

        Route::controller(GetInTouchController::class)->group(function () {
            Route::get('/get-in-touch', 'index')->name('get-in-touch');
            Route::get('/get-in-touch/{getInTouch}', 'show')->name('get-in-touch.show');
            Route::put('/get-in-touch/{id}', 'update');
        });

        Route::controller(SettingController::class)->group(function () {
            Route::get('/settings', 'index')->name('settings');
            Route::put('/setting/password/change', 'changePassword');
        });

        Route::resource('products', AdminProductController::class);
        Route::resource('categories', CategoryController::class)->only([
            'index', 'store', 'show', 'update'
        ]);
        Route::resource('subcategories', SubCategoryController::class)->only([
            'store', 'show', 'update'
        ]);
    });
});