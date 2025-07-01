<?php

use App\Http\Controllers\AttLogController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/login', [LoginController::class, 'showloginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
Route::post('/userinfo', [UserController::class, 'storeUserInfo'])->name('userinfo.store');
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
});

Route::get('/', function () {
    return view('welcome');
});
