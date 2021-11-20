<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DivisionController;
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

Route::get('/division/show/{id}', [DivisionController::class, 'show']);
Route::post('/division/create', [DivisionController::class, 'create']);
Route::delete('/division/delete/{id}', [DivisionController::class, 'delete']);
Route::post('/division/update', [DivisionController::class, 'update']);

Route::get('/division/all', [DivisionController::class, 'all']);
Route::get('/division/list-subdivision/{id}', [DivisionController::class, 'listSubdivision']);
