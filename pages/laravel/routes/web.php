<?php

use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\RequestsController;
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

Route::get('laravel', function () {
    return view('welcome');
});

Route::get('laravel/requests', [RequestsController::class, 'index']);

Route::get('laravel/requests/extended', [RequestsController::class, 'extended']);

Route::resource('laravel/admin/requests', AdminRequestController::class)
->middleware('basicAuth');