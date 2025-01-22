@extends('layouts.app')

@section('title', 'Alterar Usuário')

@section('content')
    <form id="updateUserForm" 
        action="{{ route('usuarios.update', $user->id) }}" 
        class="shadow p-4 rounded bg-light"
    >
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input 
                type="text" 
                id="nome" 
                name="nome" 
                class="form-control" 
                value="{{ old('nome', $user->nome) }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control" 
                value="{{ old('email', $user->email) }}" 
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection
