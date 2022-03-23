<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{GolonganController};
use \App\Http\Controllers\{KaryawanController};
use \App\Http\Controllers\{GajiController};

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

Route::get('/', [GolonganController::class, 'index']);

Route::get('golongan', [GolonganController::class, 'index']);
Route::get('golongan/add', [GolonganController::class, 'create']);
Route::post('golongan/add', [GolonganController::class, 'store']);
Route::get('golongan/{id}/edit', [GolonganController::class, 'edit']);
Route::patch('golongan/{id}/edit', [GolonganController::class, 'update']);
Route::delete('golongan/{id}/delete', [GolonganController::class, 'destroy']);

Route::get('karyawan', [KaryawanController::class, 'index']);
Route::get('karyawan/add', [KaryawanController::class, 'create']);
Route::post('karyawan/add', [KaryawanController::class, 'store']);
Route::get('karyawan/{id}/edit', [KaryawanController::class, 'edit']);
Route::patch('karyawan/{id}/edit', [KaryawanController::class, 'update']);
Route::delete('karyawan/{id}/delete', [KaryawanController::class, 'destroy']);

Route::get('gaji', [GajiController::class, 'index']);
Route::get('gaji/add', [GajiController::class, 'create']);
Route::post('gaji/add', [GajiController::class, 'store']);
Route::get('gaji/{id}/edit', [GajiController::class, 'edit']);
Route::patch('gaji/{id}/edit', [GajiController::class, 'update']);
Route::delete('gaji/{id}/delete', [GajiController::class, 'destroy']);
