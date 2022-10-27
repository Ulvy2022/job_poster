<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserPlaneController;
use App\Http\Controllers\JobsPosterController;

// For only get and post==================
Route::apiResource('/user', UserController::class);
Route::get('/count', [UserController::class,'count']);
Route::get('/getUser/{id}', [UserController::class, 'getUserById']);
Route::put('/updateImg/{id}', [UserController::class, 'updateImg']);

// user subscription
Route::apiResource('/subscription', SubscribeController::class);

// minus 1 user's charge after they posted job
Route::put('/minusCharge/{id}', [SubscribeController::class, 'minusCharge']);

Route::apiResource('/userPlane', UserPlaneController::class);


Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class , 'logout']);


// Job
Route::apiResource('/jobposter', JobsPosterController::class);
//features
Route::apiResource('/features', FeaturesController::class);

// update verify code
Route::put('/verifyCode', [UserController::class , 'verifyCode']);
Route::put('/resetPsw/{id}', [UserController::class , 'resetPassword']);
Route::get('/userBy/{email}', [UserController::class , 'getUserByEmail']);
Route::post('/sendCode/{email}', [MailController::class , 'sendVerifyCode']);
Route::put('/setUserToAdmine/{email}', [MailController::class , 'setUserToAdmine']);







