<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleAuthController;

Route::apiResource('/user', UserController::class);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class , 'logout']);
// Route::get('/auth/google',[GoogleAuthController::class,'redirect']);
// Route::get('http://localhost:8000/auth/google/call-back', [GoogleAuthController::class , 'callbackGoogle']);

Route::post('/user/register', [UserController::class, 'register']);
