<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::apiResource('/user', UserController::class);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class , 'logout']);
