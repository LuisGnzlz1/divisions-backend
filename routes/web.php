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

Route::prefix('api/division')->group(function () {

    Route::get('/show/{id}', [DivisionController::class, 'show']);
    Route::post('/create', [DivisionController::class, 'create']);
    Route::delete('/delete/{id}', [DivisionController::class, 'delete']);
    Route::post('/update', [DivisionController::class, 'update']);

    Route::get('/all', [DivisionController::class, 'all']);
    Route::get('/subdivision/{id}', [DivisionController::class, 'listSubdivision']);
});


