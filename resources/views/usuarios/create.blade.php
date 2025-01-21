@extends('layouts.app')

@section('title', 'Criar Novo Usuário')

@section('content')
    
    <form id="createUserForm" class="mt-4"
        action="{{ route('usuarios.store') }}" 
    >
        @csrf <!-- Token de segurança obrigatório -->

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome" required value="{{ old('nome') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Digite o e-mail" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a senha" required value="{{ old('senha') }}">
        </div>

        <div class="mb-3">
            <label for="senha_confirmation" class="form-label">Confirme a Senha:</label>
            <input type="password" name="senha_confirmation" id="senha_confirmation" class="form-control" placeholder="Confirme a senha" required value="{{ old('senha_confirmation') }}">
        </div>

        <button type="submit" class="btn btn-primary">Criar Usuário</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script type="module">
        import UsuarioDao from "{{ Vite::asset('resources/js/dao/usuario-service.js') }}" 
        const dao = new UsuarioDao('createUserForm',
            '{{ route('usuarios.index') }}'
        );
        dao.handleCreate();
    </script>

@endsection

   
