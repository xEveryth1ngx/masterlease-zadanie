<?php

use App\Http\Controllers\Api\Multiply\MultiplyController;
use Illuminate\Support\Facades\Route;

Route::get('/multiply', MultiplyController::class);
