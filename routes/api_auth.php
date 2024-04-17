<?php
declare(strict_types=1);

use App\Http\Controllers\Api\ApiAuthController;
use Illuminate\Support\Facades\Route;

Route::group(['name' => 'auth.'], function () {
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register');
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login');
});
