<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users',[UserController::class, 'index'])->name('users.index')->middleware('auth:sanctum');;
Route::post('/users',[UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');
Route::delete('/users/{id}/delete',[UserController::class, 'destroy'])->name('users.destroy');

Route::post('/login', [AuthController::class, 'login'])->name('login.api');


Route::post('/tasks',[TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks',[TaskController::class, 'allTasks'])->name('tasks.allTasks');
Route::get('/tasks/{id}',[TaskController::class, 'show'])->name('tasks.show');
Route::delete('/tasks/{id}/delete',[TaskController::class, 'destroy'])->name('tasks.delete');
Route::put('/tasks/{id}/update',[TaskController::class, 'update'])->name('tasks.update');

