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

Route::post('/register', [UserController::class, 'register']);
Route::post('/registerEmail/{email}', [MailController::class, 'registerEmail']);
Route::post('/mailToNotifyUserSub', [MailController::class, 'mailToNotifyUserSub']);

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
Route::get('/companyName', [JobsPosterController::class, 'getAllCompanyName']);
// get specific jobs
Route::get('/job/{id}', [JobsPosterController::class, 'getSpecificJobs']);


// user subscription
Route::apiResource('/subscription', SubscribeController::class);
Route::get('/UserJob/{id}', [UserController::class, 'getUserJob']);

<<<<<<< HEAD
=======
//login vai google forma
Route::post('/loginViaGoogle', [LoginController::class, 'loginViaGoogle']);


>>>>>>> a2280d726f72256c2b7beddee7fb2e292792ae3c
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
