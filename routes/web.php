<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::prefix('usuarios')->name('usuarios.')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('index');
    Route::get('/create', [UsuarioController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('edit');
    Route::post('/', [UsuarioController::class, 'store'])->name('store');
    Route::put('/{id}', [UsuarioController::class, 'update'])->name('update');
    Route::delete('/{id}', [UsuarioController::class, 'delete'])->name('delete');
});

Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
