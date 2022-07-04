<?php

use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\RequestsController;
use Illuminate\Support\Facades\Route;

Route::get('laravel', function () {
    return view('welcome');
});

Route::get('laravel/requests', [RequestsController::class, 'index']);

Route::get('laravel/requests/extended', [RequestsController::class, 'extended']);

Route::resource('laravel/admin/requests', AdminRequestController::class)
->middleware('basicAuth');