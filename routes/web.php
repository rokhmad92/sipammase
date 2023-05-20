<?php

use App\Http\Controllers\berandaController;
use App\Http\Controllers\pengajuanController;
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

Route::get('/', berandaController::class);
Route::controller(pengajuanController::class)->group(function() {
    Route::get('/pengajuan', 'index');
});
