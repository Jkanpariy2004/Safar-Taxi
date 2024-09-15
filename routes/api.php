<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace ('api')->middleware(['throttle'])->group(function(){
    // send  Otp
    Route::post('sendotp',[Controller::class,'send_otp'])->name('send_otp');
    
    // veryfy  Otp
    Route::post('verifyotp',[Controller::class,'verify_otp'])->name('verify_otp');
    
    // veryfy  Otp
    Route::post('getuserdetails',[Controller::class,'user_details'])->name('user_details');    
    // veryfy  Otp
    Route::post('updateprofile',[Controller::class,'update_profile'])->name('update_profile');
    
    Route::get('get_car_price',[Controller::class,'car_type_km'])->name('car_type_km');
    
    Route::post('send_booking',[Controller::class,'send_booking'])->name('send_booking');
    
    Route::post('booking_history',[Controller::class,'bookinghistory'])->name('bookinghistory');
    
    Route::post('retrun_booking_history',[Controller::class,'returnbookinghistory'])->name('returnbookinghistory');
    
});