<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController as PaymentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'getUsersByName']);
Route::get('/items/{user:slug}', [UserController::class, 'getItemsBySlug']);
Route::post('/createTransaction', [PaymentController::class, 'createTransaction']);
// Route::get('/items/{user:slug}', [ItemController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
