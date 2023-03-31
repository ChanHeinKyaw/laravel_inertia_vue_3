<?php

use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/major', [MajorController::class, 'index']);
Route::get('/major/create', [MajorController::class, 'create']);
Route::post('/major', [MajorController::class, 'store']);
Route::get('/major/{id}/edit', [MajorController::class, 'edit']);
Route::put('/major/{id}', [MajorController::class, 'update']);
Route::delete('/major/{id}', [MajorController::class, 'delete']);
