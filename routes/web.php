<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index'])->name('home');

Route::get('/register', [StudentController::class, 'showRegister'])->name('register');
Route::post('/register', [StudentController::class, 'register'])->name('register.store');

Route::get('/login', [StudentController::class, 'showLogin'])->name('login');
Route::post('/login', [StudentController::class, 'login'])->name('login.store');

Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
