<?php

use App\Http\Controllers\dashboard\productos\ProductosController;
use App\Http\Controllers\FerSeLaComeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Principal\PrincipalController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ____________________________

Route::name('principal.')->group(function () {
    Route::get('/', [PrincipalController::class, 'index'])->name("index");
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ProductosController::class, 'index'])->name("productos");
});
