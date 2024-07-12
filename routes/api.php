<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api user 

Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'insert']);
Route::put('/register/{id}', [UserController::class, 'update']);
Route::delete('/register/{id}', [UserController::class, 'delete']);

// api categpry 

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'insert']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'delete']);



