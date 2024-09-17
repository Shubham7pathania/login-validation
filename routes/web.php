<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RazorpayController;


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/user-registration', [UserController::class, 'show'])->name('register.show');
Route::get('/user-login', [LoginController::class, 'show'])->name('login.show');

Route::post('/user-registration', [UserController::class, 'store'])->name('user.register');
Route::post('/user-login', [LoginController::class, 'login'])->name('user.login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/payment', [RazorpayController::class, 'formPage'])->name('payment');
Route::post('/payment', [RazorpayController::class, 'makeOrder'])->name('make.order');

Route::post('/success', [RazorpayController::class, 'success'])->name('success');