<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/web/public.php';
require __DIR__ . '/web/guest.php';
require __DIR__ . '/web/user.php';
require __DIR__ . '/web/admin.php';

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});