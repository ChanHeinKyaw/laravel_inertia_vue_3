<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
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

// Major CRUD
Route::get('/major', [MajorController::class, 'index'])->name('major');
Route::get('/major/create', [MajorController::class, 'create'])->name('major.create');
Route::post('/major', [MajorController::class, 'store'])->name('major.store');
Route::get('/major/{id}/edit', [MajorController::class, 'edit'])->name('major.edit');
Route::put('/major/{id}', [MajorController::class, 'update'])->name('major.update');
Route::delete('/major/{id}', [MajorController::class, 'delete'])->name('major.delete');

// Student CRUD
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'delete'])->name('student.delete');
