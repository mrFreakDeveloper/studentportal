<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware('auth')->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('manage/course', [CourseController::class, 'index']);
Route::get('manage/certificate', [CertificateController::class, 'index']);
Route::get('course', [CourseController::class, 'createCourse'])->name('course.add');
Route::post('create/course', [CourseController::class, 'store'])->name('save.course');
Route::post('delete/course', [CourseController::class, 'deleteCourse'])->name('delete.course');

Route::get('manage/staff', [StaffController::class, 'index']);
Route::get('staff', [StaffController::class, 'createStaff'])->name('staff.add');
Route::post('create/staff', [StaffController::class, 'store'])->name('save.staff');
Route::get('manage/added/staff/{id}',[StaffController::class,'edit']);
Route::post('update/staff/data',[StaffController::class,'Update'])->name('update.staff');

Route::get('manage/student', [StudentController::class, 'index']);
Route::get('student', [StudentController::class, 'createStudent'])->name('student.add');
Route::post('create/student', [StudentController::class, 'store'])->name('save.student');
// Route::get('manage/added/student/{id}',[StudentController::class,'edit']);
// Route::post('update/student/data',[StudentController::class,'Update'])->name('update.student');



});
