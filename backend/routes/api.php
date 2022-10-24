<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubscribsionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserPlaneController;
use App\Http\Controllers\JobsPosterController;

// For only get and post==================
Route::apiResource('/user', UserController::class);
Route::get('/count', [UserController::class,'count']);
Route::get('/getUser/{id}', [UserController::class, 'getUserById']);

// user subscription
Route::apiResource('/subscription', SubscribsionController::class);

Route::apiResource('/userPlane', UserPlaneController::class);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class , 'logout']);
// Route::get('/auth/google',[GoogleAuthController::class,'redirect']);
// Route::get('http://localhost:8000/auth/google/call-back', [GoogleAuthController::class , 'callbackGoogle']);

// Job
Route::apiResource('/jobposter', JobsPosterController::class);
Route::get('/jobposter/{id}', [JobsPosterController::class, 'getJobById']);

// update verify code
Route::put('/verifyCode', [UserController::class , 'verifyCode']);
Route::put('/resetPsw/{id}', [UserController::class , 'resetPassword']);
Route::get('/userBy/{email}', [UserController::class , 'getUserByEmail']);
Route::post('/sendCode/{email}', [MailController::class , 'sendVerifyCode']);







