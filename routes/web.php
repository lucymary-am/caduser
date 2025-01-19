<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

// Rota para salvar um novo usuário
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

// Rota para exibir o formulário de edição de um usuário específico

// Rota para atualizar um usuário específico
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

// Rota para excluir um usuário específico
Route::delete('/usuarios/{id}', [UsuarioController::class, 'delete'])->name('usuarios.delete');


Route::get('/', function () {
    return view('welcome');
});
