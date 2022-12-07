<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WargaController;


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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('warga', [WargaController::class, 'index'])->name('warga')->middleware('auth');
Route::post('warga', [WargaController::class, 'store'])->name('wargaStore')->middleware('auth');
Route::put('warga', [WargaController::class, 'update'])->name('wargaUpdate')->middleware('auth');
Route::delete('warga', [WargaController::class, 'drop'])->name('wargaDrop')->middleware('auth');
Route::get('warga/export_excel', [WargaController::class, 'exportExcel'])->name('wargaExportExcel')->middleware('auth');
Route::post('warga/import_excel', [WargaController::class, 'importExcel'])->name('wargaImportExcel')->middleware('auth');
