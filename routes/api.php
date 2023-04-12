<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimplexController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\UserController;


Route::post('/getquote', [SimplexController::class, 'getQuote']);

Route::prefix('user')->group(function(){
    Route::post('login',                           [AuthController::class,'login']);
    Route::post('register',                        [AuthController::class,'register']);
    Route::post('forgot-password',                 [AuthController::class,'forgotPasswordSubmit']);
    Route::post('forgot-password/verify-code',     [AuthController::class,'verifyCodeSubmit']);
    Route::post('reset-password',                  [AuthController::class,'resetPasswordSubmit']);
   
    Route::post('verify-email',                    [AuthController::class,'verifyEmailSubmit'])->middleware('auth:sanctum');
    Route::get('resend/verify-email/code',         [AuthController::class,'verifyEmailResendCode'])->name('verify.email.resend')->middleware('auth:sanctum');
    Route::post('two-step/verification',           [AuthController::class,'twoStepVerify'])->middleware('auth:sanctum');
    Route::get('resend/two-step/verify-code',      [AuthController::class,'twoStepResendCode'])->middleware('auth:sanctum');

    Route::middleware(['auth:sanctum'])->group(function(){
        Route::post('logout',                  [AuthController::class,'logout']);
        Route::get('/dashboard',               [UserController::class,'index']);
        Route::get('/user-info',               [UserController::class,'userInfo']);
   
    });
});