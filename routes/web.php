<?php

use App\Http\Controllers\Backend\AdressController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::resource('users',UserController::class);
Route::get('/users/{user}/change-password',[UserController::class,'getPassword']);
Route::post('/users/{user}/change-password',[UserController::class,'postPassword']);

Route::resource('/users/{user}/adresses',AdressController::class);

Route::resource('/categories',CategoryController::class);
