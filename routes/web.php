<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;

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


Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

    
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //aduan
Route::get('/aduan', [AduanController::class, 'index']);
Route::get('/aduan_saya', [AduanController::class, 'aduanSaya']);
Route::get('/aduan_detail/{id}', [AduanController::class, 'detail']);
Route::get('/aduan_create/{nik}', [AduanController::class, 'create']);
Route::post('/aduan_store', [AduanController::class, 'store']);
Route::delete('/aduan_destroy/{id}', [AduanController::class, 'destroy']);

//admin
Route::get('/aduan_tertunggu', [AdminController::class, 'tertunggu']);
Route::get('/aduan_terproses', [AdminController::class, 'terproses']);
Route::get('/aduan_terterima', [AdminController::class, 'terterima']);
Route::get('/aduan_tertolak', [AdminController::class, 'tertolak']);
Route::put('/aduan_proses/{id}', [AdminController::class, 'proses']);

//petugas
Route::get('/aduan_diproses', [PetugasController::class, 'diproses']);
Route::get('/aduan_diterima', [PetugasController::class, 'diterima']);
Route::put('/aduan_terima/{id}', [PetugasController::class, 'terima']);
Route::put('/aduan_tolak/{id}', [PetugasController::class, 'tolak']);

    




