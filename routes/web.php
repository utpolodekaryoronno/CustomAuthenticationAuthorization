<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', [StudentController::class, 'index'])->name('home');


// Student Routes
Route::get('/register', [StudentController::class, 'showRegister'])->name('register')->Middleware('loggedinMiddleware');
Route::post('/register', [StudentController::class, 'register'])->name('register.store');

Route::get('/login', [StudentController::class, 'showLogin'])->name('login')->Middleware('loggedinMiddleware');
Route::post('/login', [StudentController::class, 'login'])->name('login.store');

Route::get('/profile', [StudentController::class, 'profile'])->name('profile')->Middleware('login-checking');
Route::get('/profile/edit', [StudentController::class, 'editProfile'])->name('profile.edit')->Middleware('login-checking');
Route::put('/profile/edit', [StudentController::class, 'updateProfile'])->name('profile.update');
Route::delete('/profile/delete', [StudentController::class, 'deleteProfile'])->name('profile.delete');

Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    return redirect()->route('login');
});



// Staff Routes
Route::get('/staff/register', [StaffController::class, 'showRegisterStaff'])->name('register.staff')->Middleware('loggedinMiddlewareStaff');
Route::post('/staff/register', [StaffController::class, 'registerStaff'])->name('register.store.staff');

Route::get('/staff/login', [StaffController::class, 'showLoginStaff'])->name('login.staff')->Middleware('loggedinMiddlewareStaff');
Route::post('/staff/login', [StaffController::class, 'loginStaff'])->name('login.store.staff');

Route::get('/staff/profile', [StaffController::class, 'profileStaff'])->name('profile.staff')->Middleware('login-checking-staff');

Route::post('/staff/logout', [StaffController::class, 'logoutStaff'])->name('logout.staff');
Route::get('/staff/logout', function () {
    return redirect()->route('login.staff');
});


// teacher Routes
Route::get('/teacher/register', [TeacherController::class, 'showRegisterTeacher'])->name('register.teacher')->Middleware('loggedinMiddlewareTeacher');
Route::post('/teacher/register', [TeacherController::class, 'registerTeacher'])->name('register.store.teacher');

Route::get('/teacher/login', [TeacherController::class, 'showLoginTeacher'])->name('login.teacher')->Middleware('loggedinMiddlewareTeacher');
Route::post('/teacher/login', [TeacherController::class, 'loginTeacher'])->name('login.store.teacher');

Route::get('/teacher/profile', [TeacherController::class, 'profileTeacher'])->name('profile.teacher')->Middleware('login-checking-teacher');

Route::post('/teacher/logout', [TeacherController::class, 'logoutTeacher'])->name('logout.teacher');
Route::get('/teacher/logout', function () {
    return redirect()->route('login.teacher');
});



