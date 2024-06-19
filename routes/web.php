<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

/** 
 * HTTP Method:
 * 1. Get: Untuk Menampilkan
 * 2. Post: Untuk Mengirim Data
 * 3. Put: Untuk Meng-update Data
 * 4. Delete: Untuk MEnghapus Data
*/

// Route Untuk Menampilkan Teks Salam
Route::get('/salam', function(){
    return "Assalamualaikum...";
});

Route::get('/profile', function(){
    return view('profile');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('admin/student', [StudentController::class, 'index'])->middleware('admin');


Route::get('admin/courses', [CoursesController::class, 'index'])->middleware('admin');

// Route untuk Menampilkan Form Tambah Student
Route::get('admin/student/create', [StudentController::class, 'create'])->middleware('admin');

// Route untuk Menampilkan Data Student Baru
Route::post('admin/student/store', [StudentController::class, 'store'])->middleware('admin');

// Route untuk Menampilkan Halaman Edit Student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->middleware('admin');

// Route untuk Menyimpan Hasil Update Student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// Route untuk Menghapus Student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

// Route untuk Menampilkan Form Tambah Courses
Route::get('admin/courses/create', [CoursesController::class, 'create']);

// Route untuk Menampilkan Data Courses Baru
Route::post('admin/courses/store', [CoursesController::class, 'store']);

// Route untuk Menampilkan Halaman Edit Courses
Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);

// Route untuk Menyimpan Hasil Update Courses
Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

// Route untuk Menghapus Courses
Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
