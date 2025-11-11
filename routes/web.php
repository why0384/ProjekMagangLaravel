<?php

use App\Models\Vehicle;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverVehicleController;
use App\Http\Controllers\RideRequestController;

Route::get('/', function () {
    if (session()->has('login')) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

 
Route::middleware('checkLogin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    // User
    Route::get('user', [UserController::class, 'user'])->name('user');
    Route::get('user/create', [UserController::class, 'create'])->name('userCreate');
    Route::post('user/store', [UserController::class, 'store'])->name('userStore');
    
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::delete('/user/destroy{id}', [UserController::class, 'destroy'])->name('userDelete');

    // Student
    Route::get('student', [StudentController::class, 'student'])->name('student');
    Route::get('student/create', [StudentController::class, 'create'])->name('studentCreate');
    Route::post('student/store', [StudentController::class, 'store'])->name('studentStore');

    Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('studentEdit');
    Route::post('student/update/{id}', [StudentController::class, 'update'])->name('studentUpdate');
    Route::delete('/student/destroy{id}', [StudentController::class, 'destroy'])->name('studentDelete');

    // Driver
    Route::get('driver', [DriverController::class, 'driver'])->name('driver');
    Route::get('driver/create', [DriverController::class, 'create'])->name('driverCreate');
    Route::post('driver/store', [DriverController::class, 'store'])->name('driverStore');
    
    Route::get('driver/edit/{id}', [DriverController::class, 'edit'])->name('driverEdit');
    Route::post('driver/update/{id}', [DriverController::class, 'update'])->name('driverUpdate');
    Route::delete('/driver/destroy{id}', [DriverController::class, 'destroy'])->name('driverDelete');

    // tombol ajax driver
    Route::post('/driver/toggle-status/{id}', [DriverController::class, 'toggleStatus'])->name('driver.toggleStatus');
    

    // Vehicle
    Route::get('vehicle', [VehicleController::class, 'vehicle'])->name('vehicle');
    Route::get('vehicle/create', [VehicleController::class, 'create'])->name('vehicleCreate');
    Route::post('vehicle/store', [VehicleController::class, 'store'])->name('vehicleStore');
    
    Route::get('vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('vehicleEdit');
    Route::post('vehicle/update/{id}', [VehicleController::class, 'update'])->name('vehicleUpdate');
    Route::delete('/vehicle/destroy{id}', [VehicleController::class, 'destroy'])->name('vehicleDelete');

    // Driver_Vehicle
    Route::get('driver_vehicle', [DriverVehicleController::class, 'driver_vehicle'])->name('driver_vehicle');
    Route::get('driver_vehicle/create', [DriverVehicleController::class, 'create'])->name('driver_vehicleCreate');
    Route::post('driver_vehicle/store', [DriverVehicleController::class, 'store'])->name('driver_vehicleStore');
     
    Route::get('driver_vehicle/edit/{id}', [DriverVehicleController::class, 'edit'])->name('driver_vehicleEdit');
    Route::post('driver_vehicle/update/{id}', [DriverVehicleController::class, 'update'])->name('driver_vehicleUpdate');
    Route::delete('/driver_vehicle/destroy{id}', [DriverVehicleController::class, 'destroy'])->name('driver_vehicleDelete');

    // Status
    Route::get('/status', [StatusController::class, 'status'])->name('status');
    Route::get('/status/create', [StatusController::class, 'create'])->name('statusCreate');
    Route::post('/status/store', [StatusController::class, 'store'])->name('statusStore');
    
    Route::get('/status/edit/{status}', [StatusController::class, 'edit'])->name('statusEdit');
    Route::post('/status/update/{status}', [StatusController::class, 'update'])->name('statusUpdate');
    Route::delete('/status/destroy/{status}', [StatusController::class, 'destroy'])->name('statusDelete');

    // History
    Route::get('history', [HistoryController::class, 'history'])->name('history');
    Route::get('history/create', [HistoryController::class, 'create'])->name('historyCreate');
    Route::post('history/store', [HistoryController::class, 'store'])->name('historyStore');
    
    Route::get('history/edit/{id}', [HistoryController::class, 'edit'])->name('historyEdit');
    Route::post('history/update/{id}', [HistoryController::class, 'update'])->name('historyUpdate');
    Route::delete('/history/destroy{id}', [HistoryController::class, 'delete'])->name('historyDelete');            

    // Schedule 
    Route::get('schedule', [ScheduleController::class, 'schedule'])->name('schedule');
    Route::get('schedule/create', [ScheduleController::class, 'create'])->name('scheduleCreate');
    Route::post('schedule/store', [ScheduleController::class, 'store'])->name('scheduleStore');

    Route::get('schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('scheduleEdit');
    Route::post('schedule/update/{id}', [ScheduleController::class, 'update'])->name('scheduleUpdate');
    Route::delete('/schedule/destroy{id}', [ScheduleController::class, 'destroy'])->name('scheduleDelete');

    // Request
    Route::get('riderequest', [RideRequestController::class, 'rideRequest'])->name('riderequest');
    Route::get('riderequest/create', [RideRequestController::class, 'create'])->name('rideRequestCreate');
    Route::post('riderequest/store', [RideRequestController::class, 'store'])->name('rideRequestStore');

    Route::get('riderequest/edit/{id}', [RideRequestController::class, 'edit'])->name('rideRequestEdit');
    Route::post('riderequest/update/{id}', [RideRequestController::class, 'update'])->name('rideRequestUpdate');
    Route::delete('/riderequest/destroy/{id}', [RideRequestController::class, 'destroy'])->name('rideRequestDelete');
}); 


