<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
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
Route::post('login_cek', [AuthController::class, 'cek_login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//aduan
Route::get('/aduan', [AduanController::class, 'index']);
Route::get('/aduan_detail/{id}', [AduanController::class, 'detail']);
Route::get('/aduan_create', [AduanController::class, 'create']);
Route::post('/aduan_store', [AduanController::class, 'store']);
Route::delete('/aduan_destroy/{id}', [AduanController::class, 'destroy']);

//admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin_edit/{id}', [AdminController::class, 'edit']);
Route::put('/admin_update/{id}', [AdminController::class, 'update']);
Route::delete('/admin_destroy/{id}', [AdminController::class, 'destroy']);

//petugas
Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/petugas_create', [PetugasController::class, 'create']);
Route::get('/petugas_edit/{id}', [PetugasController::class, 'edit']);
Route::post('/petugas_store', [PetugasController::class, 'store']);
Route::put('/petugas_update/{id}', [PetugasController::class, 'update']);
Route::delete('/petugas_destroy/{id}', [PetugasController::class, 'destroy']);

//user
Route::get('/user', [UserController::class, 'index']);
Route::get('/user_edit/{id}', [UserController::class, 'edit']);
Route::put('/user_update/{id}', [UserController::class, 'update']);
Route::delete('/user_destroy/{id}', [UserController::class, 'destroy']);





