<?php
declare(strict_types=1);

use App\Http\Controllers\Api\Multiply\MultiplyController;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/api_auth.php';

Route::get('/multiply', MultiplyController::class)
    ->middleware('auth:sanctum')
    ->name('multiply');
