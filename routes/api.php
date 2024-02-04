<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CustomerVehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\offerController;
use App\Http\Controllers\SocietiesController;
use App\Http\Controllers\VehicleBrandController;
use App\Http\Controllers\DailyCleaningController;
use App\Http\Controllers\PartnerDailyVehicleController;

use App\Http\Controllers\VTController;






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


Route::put('customers/update-app-token', [CustomerController::class, 'updateAppToken']);

Route::put('customers/update-password', [CustomerController::class, 'updatePassword']);

Route::put('/customers/forget-password', [CustomerController::class, 'forgetPassword']);

Route::put('partners/update-app-token', [PartnerController::class, 'updateAppToken']);
Route::post('partners/register', [PartnerController::class, 'register']);
Route::post('partners/login', [PartnerController::class, 'login']);
Route::get('partners/{mobile_no}', [PartnerController::class, 'getPartnerByMobileNo']);
Route::put('/partners/forget-password', [PartnerController::class, 'forgetPassword']);

Route::get('customers/{mobile_no}', [CustomerController::class, 'getCustomerByMobileNo']);

Route::post('customer/register', [CustomerController::class, 'register']);
Route::post('customer/login', [CustomerController::class, 'login']);
Route::middleware('auth:sanctum')->post('/customer/update-app-token/{mobile_no}', [CustomerController::class, 'updateAppToken']);

Route::post('/customer-vehicles/add', [CustomerVehicleController::class, 'addVehicle']);
Route::get('/customer_vehicles/{mobile_no}', [CustomerVehicleController::class, 'getCustomerVehicleByMobileNo']);
Route::put('/customer_vehicles/update{mobile_no}', [CustomerVehicleController::class, 'updateCustomerVehicleByMobileNo']);
Route::put('/partner__daily__vehicle{mobile_no}', [PartnerDailyVehicleController::class, 'PartnerDailyVehicleByMobileNo']);


Route::put('/customer-vehicles/update-status', [CustomerVehicleController::class, 'updateStatus']);

Route::put('/customer-vehicles/update-vehicle/{id}', [CustomerVehicleController::class, 'updateVehicle']);

Route::delete('/customer-vehicles/delete-vehicle', [CustomerVehicleController::class, 'deleteVehicle']);

Route::post('/bookings/create', [BookingController::class, 'createBooking']);

Route::put('/bookings/{id}/update-status', [BookingController::class, 'updateBookingStatus']);
Route::get('/offers', [OfferController::class, 'index']);
Route::get('/societies', [SocietiesController::class, 'index']);
Route::get('/vehicle_brand', [VehicleBrandController::class, 'index']);
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/partners', [PartnerController::class, 'index']);
Route::get('/daily_cleaning', [DailyCleaningController::class, 'index']);

Route::get('/vehicle_type', [VTController::class, 'index']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
