<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/**
 * HTTP Method:
 * 1. Get: untuk menampilkan
 * 2. Post: untuk mengirim data
 * 3. Put: untuk update data
 * 4. Delete: untuk hapus data
 */
//route untuk tampilkan teks salam
Route::get('admin/dashboard', [DashboardController::class, 'index']);

Route::get('admin/student', [StudentController::class, 'index']);

Route::get('admin/courses', [CoursesController::class, 'index']);
