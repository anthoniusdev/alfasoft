<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\ContactController::class, 'index'])->name('home');
Route::get('/home', [\App\Http\Controllers\ContactController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::prefix('contacts')->group(function () {
        Route::get('/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
        Route::post('/store', [\App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
        Route::get('/show/{id}', [\App\Http\Controllers\ContactController::class, 'show'])->name('contacts.show');
        Route::get('/edit/{id}', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/destroy/{id}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
