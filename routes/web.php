<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\recordController;
use App\Http\Controllers\requestController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//homepage route
Route::get('/', [loginController::class, 'login']);

//request form route
Route::get('/form', [formController::class, 'index']);

//display record route
Route::get('/record', [recordController::class, 'index']);

//edit record route
Route::get('/edit/{edit}', [recordController::class, 'editReq']);

//login request route
Route::post('/loginReq', [loginController::class, 'loginReq']);

//logout request route
Route::post('/logout', [loginController::class, 'logout']);

//submit request form data route
Route::post('/submitData', [formController::class, 'enterData']);

//submit approval/rejection route
Route::post('/sumitReq', [recordController::class, 'sumitReq']);

Route::get('/view', [requestController::class, 'index']);


