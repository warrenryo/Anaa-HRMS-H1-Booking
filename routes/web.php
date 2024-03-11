<?php


use App\Models\RoomDetails;
use App\View\Components\Calendar;
use App\Http\Controllers\Services;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookTemplate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CheckOutBookings;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookNowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomDesController;
use App\Http\Controllers\HomeBookController;
use App\Http\Controllers\FrontdeskController;
use App\Http\Controllers\BookClientController;
use App\Http\Controllers\AnaaBookingController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BookingSideController;
use App\Http\Controllers\RoomDetailsController;
use App\Http\Controllers\HousekeepingController;
use App\Http\Controllers\ActiveBookingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OccupiedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeBookController::class,'homebook']);





Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');


//NORMAL CALLING

//BOOKING
Route::get('/booknowIndex/{id}',[BookNowController::class,'book_now']);
Route::get('/booking-form', [BookNowController::class, 'book']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function(){
    //PLACE YOUR ROUTES HERE FOR VERIFIED USER


    //APPS
    Route::get('apps-todolist', [HomeController::class, 'todolist']);
    Route::get('frontdesk', [FrontdeskController::class, 'index']);
    Route::post('submit-room',  [FrontdeskController::class, 'createFrontdesk']);

    //ROOM DETAILS
    Route::get('room-details', [RoomDetailsController::class, 'roomDetailsIndex']);
    Route::post('submit-room-details', [RoomDetailsController::class, 'addRoomDetails']);
    Route::get('edit-room-details/{id}', [RoomDetailsController::class, 'edtiRoomDetails']);
    Route::get('delete-image/{id}', [RoomDetailsController::class, 'deleteImage']);
    Route::put('update-room-details/{id}', [RoomDetailsController::class, 'updateRoomDetails']);
    Route::post('update-room-status/{id}/{type_id}', [RoomDetailsController::class, 'updateRoomStatus']);
    Route::get('delete-room-details/{id}', [RoomDetailsController::class, 'deleteRoomDetails']);


    //HOUSEKEEPING 
    Route::get('housekeeping',[HousekeepingController::class,'housekeeping']);
    Route::post('submit-housekeeping-request', [HousekeepingController::class, 'submitHousekeeping']);



    //BOOKING SIDE
    Route::get('book', [BookingSideController::class, 'book']);


    //Frontdesk

    Route::get('active-bookings',[ActiveBookingsController::class,'index']);
    Route::get('occupied', [OccupiedController::class, "occupied"]);

    Route::get('add-booking',[BookingController::class,'book']);
    Route::post('add-booking',[BookingController::class,'book']);

    Route::get('appoint',[Calendar::class,'events']);

    Route::get('check-out-bookings',[CheckOutBookings::class,'checkout']);

    Route::get('services',[Services::class,'serve']);
   

    //SAMPLE

    


    //BOOK CLIENT
    Route::post('book-client', [BookClientController::class, 'addClient']);
    Route::post('submit-frontdesk-assigned-room', [BookClientController::class, 'submitAssignedRoom']);

    //LANDING

    Route::get('about',[AboutController::class,'about']);
     Route::get('properties',[AboutController::class,'properties']);
     Route::get('gallery',[AboutController::class,'gallery']);
     Route::get('blogs',[AboutController::class,'blogs']);
     Route::get('blogdetails',[AboutController::class,'blogdetails']);
     Route::get('contact',[AboutController::class,'contact']);

    //Anaa Booking


    //Anaa Room Management
    Route::get('room-ds',[RoomDesController::class,'room_ds']);
   
    

    
});

require __DIR__.'/auth.php';
