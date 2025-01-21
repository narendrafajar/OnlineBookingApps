<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ForUser\HomeController;
use App\Http\Controllers\ForUser\AppointmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/',[HomepageController::class,'index']);
Route::get('/homepage',[HomepageController::class,'index']);

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
    
// });

Route::middleware('auth:sanctum')->group(function(){

    Route::get('user-home',[HomeController::class,'index']);
    Route::get('admin-home',[HomeController::class,'index'])->middleware('can:view all menu');
    
    //Reservasi
    Route::get('/select-location',[AppointmentController::class,'location_select'])->name('location_select');
    Route::get('/treatments',[AppointmentController::class,'treatment_select']);
    Route::get('/select-slots',[AppointmentController::class,'select_slots']);
    Route::post('/check-slots',[AppointmentController::class,'check_slots']);
    Route::post('/getTherapist',[AppointmentController::class,'getTherapist']);
    Route::get('/therapist',[AppointmentController::class,'select_therapist']);
    Route::get('/preview',[AppointmentController::class,'previewUser']);
    Route::get('/appointment-review',[AppointmentController::class,'app_review'])->name('app_review');
    Route::post('/getAllAppointment',[AppointmentController::class,'getAllAppoinment']);
    Route::post('/appointment',[AppointmentController::class,'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
