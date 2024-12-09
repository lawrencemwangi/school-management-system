<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DormController;
use App\Http\controllers\DisciplineController;
use App\Http\controllers\AttendanceController;
use App\Http\controllers\FeestructureController;
use App\Http\controllers\FormController;
use App\Http\controllers\SubjectController;
use App\Http\controllers\GradeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/contact', [HomeController::class, 'Contactpage'])->name('contact');
Route::get('/inactive', [DashboardController::class, 'show'])->name('inactive');


Route::middleware('auth', 'verified','last_seen', 'inactive')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/image', [ProfileController::class, 'Profile_image'])->name('profile.image');
});


Route::middleware('admin','last_seen', 'inactive')->group(function() {
    Route::get('/admin/dashboard' , [DashboardController::class, 'index'])->name('admin_dashboard');
    Route::resource('admin/settings', SettingsController::class);
    Route::get('/admin/school/settings', [SettingsController::class, 'schoolSetting'])->name('school_settings');
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/teachers', TeacherController::class);
    Route::resource('admin/students', StudentController::class)->except('show');
    Route::resource('admin/parents', ParentsController::class);
    Route::resource('admin/classes', ClassesController::class);
    Route::resource('admin/dorms', DormController::class);
    Route::resource('admin/forms', FormController::class);
    Route::resource('admin/feestructure', FeestructureController::class);
    Route::get('/feestructure/{id}', [FeestructureController::class, 'view_feestructure'])->name('fee_structure');
    Route::resource('/admin/subject', SubjectController::class);
    Route::resource('/admin/grade', GradeController::class);
});


Route::middleware('teacher','last_seen', 'inactive')->group(function() {
    Route::get('/teacher/dashboard' , [DashboardController::class, 'index'])->name('teacher_dashboard');
    Route::resource('/teacher/discipline', DisciplineController::class);
    Route::resource('/teacher/attendance', AttendanceController::class);
    Route::post('/attendance/fetch-students', [AttendanceController::class, 'fetchStudents'])
    ->name('attendance.fetch-students');
    Route::get('/teacher/student', [StudentController::class, 'show'])->name('student.show');
    Route::get('/teacher/student/{student}', [StudentController::class, 'show_Student'])->name('view_student');

});


Route::middleware('accountant','last_seen', 'inactive')->group(function() {
    Route::get('/accountant/dashboard' , [DashboardController::class, 'index'])->name('accountant_dashboard');
});


Route::middleware('student','last_seen', 'inactive')->group(function() {
    Route::get('/student/dashboard' , [DashboardController::class, 'index'])->name('student_dashboard');
    Route::get('/student/details', [StudentController::class, 'show_details'])->name('student_details');
    Route::get('student/feestructure', [FeestructureController::class, 'Viewfeestructure'])->name('view_feestructure');
});


Route::middleware('parent','last_seen', 'inactive')->group(function() {
    Route::get('/parent/dashboard' , [DashboardController::class, 'index'])->name('parent_dashboard');
});


require __DIR__.'/auth.php';
