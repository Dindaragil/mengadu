<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AduanController;
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




Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@home')->name('home');

    //aduan
    

    //logout
    Route::get('logout', 'AuthController@logout')->name('logout');
});

Route::get('/aduan_create', [AduanController::class, 'create']);
Route::post('/aduan_store', [AduanController::class, 'store']);