<?php

use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\OrderContoller;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '{slug}/dashboard',
    [RegisteredUserController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->name('admin.')->group(function () {
    // Route::resource('/items', ItemController::class);
    Route::get('{slug}/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('{slug}/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::get('{slug}/items/{item}', [ItemController::class, 'show'])->name('items.show');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('{slug}/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::get('{slug}/orders', [OrderContoller::class, 'index'])->name('orders');
    Route::get('{slug}/statistics/{year}', [ItemController::class, 'statistics'])->name('items.statistics');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
