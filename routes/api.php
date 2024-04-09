<?php

use App\Http\Controllers\API\APIRoomDetailsController;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//SHARE ROOM DETAILS ON HOUSEKEEPING
Route::get('room-details', [APIRoomDetailsController::class, 'roomDetails']);
//UPDATE  THE STATUS WHEN THE HOUSEKEEPING WORK ORDER IS DONE
Route::post('update-room-status', [APIRoomDetailsController::class, 'updateRoom']);

Route::post('get-booking-data', [APIController::class, 'getBookingData']);

//SHARE REVIEWS TO R4
Route::get('room-reviews', [APIController::class, 'roomReviews']);
Route::post('update-status', [APIController::class, 'updateStatus']);


//FROM HOTEL 2 UPDATE THE ROOM STATUS TO RESERVED IF USER DONE BOOKING
Route::post('reserve-room-status', [APIRoomDetailsController::class, 'reservedRoom']);

//FROM HOTEL 2 UPDATE THE USER VIP TO YES
Route::post('loyalty-update', [APIController::class, 'loyaltyUpdate']);

//FROM HOTEL 2 PLUS POINTS
Route::post('plus-points', [APIController::class, 'plusPoints']);

//TO HOTEL 2 SHARE VIP USERS
Route::get('loyalty-users', [APIController::class, 'loyaltyUsers']);