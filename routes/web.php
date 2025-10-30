<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', [StudentController::class, 'index'])->name('home');

Route::get('/register', [StudentController::class, 'showRegister'])->name('register')->Middleware('loggedinMiddleware');
Route::post('/register', [StudentController::class, 'register'])->name('register.store');

Route::get('/login', [StudentController::class, 'showLogin'])->name('login')->Middleware('loggedinMiddleware');
Route::post('/login', [StudentController::class, 'login'])->name('login.store');

Route::get('/profile', [StudentController::class, 'profile'])->name('profile')->Middleware('login-checking');
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');



// Staff Routes
Route::get('/staff/register', [StaffController::class, 'showRegisterStaff'])->name('register.staff')->Middleware('loggedinMiddlewareStaff');
Route::post('/staff/register', [StaffController::class, 'registerStaff'])->name('register.store.staff');

Route::get('/staff/login', [StaffController::class, 'showLoginStaff'])->name('login.staff')->Middleware('loggedinMiddlewareStaff');
Route::post('/staff/login', [StaffController::class, 'loginStaff'])->name('login.store.staff');

Route::get('/staff/profile', [StaffController::class, 'profileStaff'])->name('profile.staff')->Middleware('login-checking-staff');
Route::post('/staff/logout', [StaffController::class, 'logoutStaff'])->name('logout.staff');



// teacher Routes
Route::get('/teacher/register', [TeacherController::class, 'showRegisterTeacher'])->name('register.teacher')->Middleware('loggedinMiddlewareTeacher');
Route::post('/teacher/register', [TeacherController::class, 'registerTeacher'])->name('register.store.teacher');

Route::get('/teacher/login', [TeacherController::class, 'showLoginTeacher'])->name('login.teacher')->Middleware('loggedinMiddlewareTeacher');
Route::post('/teacher/login', [TeacherController::class, 'loginTeacher'])->name('login.store.teacher');

Route::get('/teacher/profile', [TeacherController::class, 'profileTeacher'])->name('profile.teacher')->Middleware('login-checking-teacher');
Route::post('/teacher/logout', [TeacherController::class, 'logoutTeacher'])->name('logout.teacher');
