<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/user-registration', [UserController::class, 'show'])->name('register.show');
Route::get('/user-login', [LoginController::class, 'show'])->name('login.show');

Route::post('/user-registration', [UserController::class, 'store'])->name('user.register');
Route::post('/user-login', [LoginController::class, 'login'])->name('user.login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');