<?php

use App\Http\Controllers\AttLogController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MCUController;
use App\Http\Controllers\EmployeePermitController;

Route::get('/login', [LoginController::class, 'showloginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/attendence', [AttLogController::class, 'index'])->name('attendence.index');
    Route::get('/attendence/create', [AttLogController::class, 'create'])->name('attendence.create');
    Route::post('/attendence', [AttLogController::class, 'store'])->name('attendence.store');
    Route::get('/attendence/{id}/edit', [AttLogController::class, 'edit'])->name('attendence.edit');
    Route::put('/attendence/{id}', [AttLogController::class, 'update'])->name('attendence.update');
    Route::delete('/attendence/{id}', [AttLogController::class, 'destroy'])->name('attendence.destroy');

    Route::get('/employee-permit', [EmployeePermitController::class, 'index'])->name('employee_permit.index');
    Route::get('/employee-permit/create', [EmployeePermitController::class, 'create'])->name('employee_permit.create');
    Route::post('/employee-permit', [EmployeePermitController::class, 'store'])->name('employee_permit.store');
    Route::get('/employee-permit/{id}/edit', [EmployeePermitController::class, 'edit'])->name('employee_permit.edit');
    Route::put('/employee-permit/{id}', [EmployeePermitController::class, 'update'])->name('employee_permit.update');
    Route::delete('/employee-permit/{id}', [EmployeePermitController::class, 'destroy'])->name('employee_permit.destroy');

    Route::get('/mcu', [MCUController::class, 'index'])->name('mcu.index');
    Route::get('/mcu/create', [MCUController::class, 'create'])->name('mcu.create');
    Route::post('/mcu', [MCUController::class, 'store'])->name('mcu.store');
    Route::get('/mcu/{id}/edit', [MCUController::class, 'edit'])->name('mcu.edit');
    Route::put('/mcu/{id}', [MCUController::class, 'update'])->name('mcu.update');
    Route::delete('/mcu/{id}', [MCUController::class, 'destroy'])->name('mcu.destroy');

    Route::get('/userinfo', [UserController::class, 'createUserInfo'])->name('userinfo');
    Route::post('/userinfo', [UserController::class, 'storeUserInfo'])->name('userinfo.store');
});

Route::get('/', function () {
    return view('welcome');
});
