@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Usuário</h1>

    <!-- Exibir mensagens de erro -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de edição -->
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT') 

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
</div>
@endsection
