<?php

use App\Http\Controllers\DashboardController;
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
