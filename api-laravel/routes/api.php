<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\Api\V1\InvoiceController;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/users',[UserController::class, 'index']);
Route::get('/users/{user}',[UserController::class, 'show']);


Route::post('/login', [AuthController::class, 'login']);
Route::get('/teste', [TesteController::class, 'index'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');




//Usando o api resource você economiza em rotas para fazer o crud

//Route::apiResource('invoices', InvoiceController::class);

Route::get('/invoices',[InvoiceController::class, 'index']);
Route::get('/invoices/{invoice}',[InvoiceController::class, 'show']);


Route::middleware('auth:sanctum')->group(function(){
    Route::delete('/invoices/{invoice}/delete',[InvoiceController::class, 'destroy']);
    Route::put('/invoices/{invoice}/edit',[InvoiceController::class, 'update']);
    Route::post('/invoices',[InvoiceController::class, 'store']);
});