<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('users', [UserController::class, 'index'])->name('index');
Route::get('users/create', [UserController::class, 'create'])->name('create');
Route::post('users', [UserController::class, 'store'])->name('store');
Route::get('users/{user}', [UserController::class, 'show'])->name('show');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('destroy');
