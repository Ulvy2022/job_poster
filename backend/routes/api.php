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

/**
 * Register by input in form
 * Register by google
 */
Route::post('/register', [UserController::class, 'register']);
// Route::post('/registerByGoogle', [UserController::class, 'registerByGoogle']);
/**
 * Send email to client when he or she already registered.
 */
Route::post('/registerEmail/{email}', [MailController::class, 'registerEmail']);

// mail to notify user when their account is expired before 7 days
Route::post('/mailToNotifyUserSub', [MailController::class, 'mailToNotifyUserSub']);

// For only get and post==================
Route::apiResource('/user', UserController::class);
Route::get('/count', [UserController::class, 'count']);
Route::get('/getUser/{id}', [UserController::class, 'getUserById']);
Route::put('/updateImg/{id}', [UserController::class, 'updateImg']);
Route::put('/changePassword/{id}', [UserController::class, 'changePassword']);

// get all not expire jobs
Route::get('/setJobToExpired', [JobsPosterController::class, 'setJobToExpired']);
Route::get('/mail', [MailController::class, 'mailToNotifyUserSub']);

// get all job title
Route::get('/jobTitle', [JobsPosterController::class, 'getAllJobsTitle']);
// get all comapny name
Route::get('/companyName', [JobsPosterController::class, 'getAllCompanyName']);
// get specific jobs
Route::get('/job/{id}', [JobsPosterController::class, 'getSpecificJobs']);


// user subscription
Route::apiResource('/subscription', SubscribeController::class);
// user post job
Route::get('/UserJob/{id}', [UserController::class, 'getUserJob']);

//login vai google forma
Route::post('/loginViaGoogle', [LoginController::class, 'loginViaGoogle']);


// minus 1 user's charge after they posted job
Route::put('/minusCharge/{id}', [SubscribeController::class, 'minusCharge']);

Route::apiResource('/userPlane', UserPlaneController::class);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


// Job
Route::apiResource('/jobposter', JobsPosterController::class);
//features
Route::apiResource('/features', FeaturesController::class);
Route::get('/jobposter/{id}', [JobsPosterController::class, 'getJobById']);

// update verify code
Route::put('/verifyCode', [UserController::class, 'verifyCode']);
Route::put('/resetPsw/{id}', [UserController::class, 'resetPassword']);
Route::get('/userBy/{email}', [UserController::class, 'getUserByEmail']);
Route::post('/sendCode/{email}', [MailController::class, 'sendVerifyCode']);
Route::put('/setUserToAdmine/{email}', [MailController::class, 'setUserToAdmine']);
