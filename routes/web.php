<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'Homepage'])->name('home');
Route::get('/admin', [HomeController::class, 'Admin'])->name('admin');
Route::get('/about', [HomeController::class, 'About'])->name('about');
Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('user_level:1,0')->group(function() {
    Route::get('/admin/dashboard' , [DashboardController::class, 'index'])->name('admin_dashboard');
    Route::resource('admin/settings', SettingsController::class);
    Route::resource('admin/users', UserController::class);
});


Route::middleware('user_level:2')->group(function() {
    Route::get('/teacher/dashboard' , [DashboardController::class, 'index'])->name('teacher_dashboard');
});


Route::middleware('user_level:3')->group(function() {
    Route::get('/accountant/dashboard' , [DashboardController::class, 'index'])->name('accountant_dashboard');
});


Route::middleware('user_level:4')->group(function() {
    Route::get('/student/dashboard' , [DashboardController::class, 'index'])->name('student_dashboard');
});


Route::middleware('user_level:5')->group(function() {
    Route::get('/parent/dashboard' , [DashboardController::class, 'index'])->name('parent_dashboard');
});


require __DIR__.'/auth.php';
