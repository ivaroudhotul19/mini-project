<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\AdminMatakuliahController;
use App\Http\Controllers\AdminNilaiController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LoginController::class)->group(function(){
    Route::get ('/', 'index')->name('login')->middleware('guest');
    Route::post('/', 'authenticate')->middleware('guest');
    Route::post('/logout', 'logout')->middleware('auth');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/dashboard/mahasiswa', AdminMahasiswaController::class)->middleware('admin');
Route::get('/download/mahasiswa', [AdminMahasiswaController::class, 'print'])->middleware('admin');
Route::get('/download/detail-mahasiswa/{mahasiswa}', [AdminMahasiswaController::class, 'print_detail'])->middleware('admin');

Route::resource('/dashboard/matakuliah', AdminMatakuliahController::class)->except('show')->middleware('admin');
Route::get('/download/matakuliah', [AdminMatakuliahController::class, 'print'])->middleware('admin');

Route::resource('/dashboard/nilai', AdminNilaiController::class)->middleware('admin');
Route::get('/download/nilai', [AdminNilaiController::class, 'print'])->middleware('admin');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('user');