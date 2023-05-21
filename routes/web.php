<?php

use App\Http\Controllers\basicController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\masterController;
use App\Http\Controllers\pengajuanController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

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

// Basic Page
Route::controller(basicController::class)->middleware('guest')->group(function() {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'login_post');
});
Route::get('/logout', [basicController::class, 'logout']);

// setelah login
Route::get('/beranda', berandaController::class)->middleware('auth');
Route::controller(pengajuanController::class)->middleware('auth')->group(function() {
    Route::get('/pengajuan', 'index');
    Route::get('/pengajuan/{rancangan}', 'tambah');
    Route::post('/pengajuan/{rancangan}', 'store');
});

// Master Data
Route::controller(masterController::class)->middleware('auth')->group(function() {
    Route::get('/role', 'role');
    Route::post('/role', 'role_store');
    Route::post('/role/{id}', 'role_update');
    Route::get('/role/{id}', 'role_destroy');
    
    Route::get('/tahun', 'tahun');
    Route::post('/tahun', 'tahun_store');
    Route::post('/tahun/{id}', 'tahun_update');

    Route::get('/rancangan', 'rancangan');
    Route::post('/rancangan', 'rancangan_store');
    Route::post('/rancangan/{id}', 'rancangan_update');

    Route::get('/kpengajuan', 'kpengajuan');
    Route::post('/kpengajuan', 'kpengajuan_store');
    Route::post('/kpengajuan/{id}', 'kpengajuan_update');

    Route::get('/pemrakarsa', 'pemrakarsa');
    Route::post('/pemrakarsa', 'pemrakarsa_store');
    Route::post('/pemrakarsa/{id}', 'pemrakarsa_update');

    Route::get('/posisi', 'posisi');
    Route::post('/posisi', 'posisi_store');
    Route::post('/posisi/{id}', 'posisi_update');
});

// Users
Route::controller(userController::class)->middleware('auth')->group(function() {
    Route::get('/profile/{user:username}', 'index');
    Route::post('/profile/{user:username}', 'index_update');
});