<?php

use App\Http\Controllers\AdminGroupController;
use App\Http\Controllers\GroupsController;
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
    return view('welcome');
});

Route::get('groups', [GroupsController::class, 'index']);

Route::get('group/{id}', [GroupsController::class, 'group']);

Route::resource('admin/groups', AdminGroupController::class);

/*Route::get('admin/groups', [AdminGroupController::class, 'index']);

Route::get('admin/groups/create', [AdminGroupController::class, 'create']);

Route::get('admin/groups/store', [AdminGroupController::class, 'store']);

Route::get('admin/groups/edit', [AdminGroupController::class, 'edit']);

Route::get('admin/groups/update', [AdminGroupController::class, 'update']);

Route::get('admin/groups/destroy', [AdminGroupController::class, 'destroy']);*/