@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <div class="container mt-5">
        <h1>Criar Novo Usuário</h1>
        
        <!-- Exibe mensagens de erro, se existirem -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST" class="mt-4">
            @csrf <!-- Token de segurança obrigatório -->

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite o e-mail" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a senha" required>
            </div>

            <div class="mb-3">
                <label for="senha_confirmation" class="form-label">Confirme a Senha:</label>
                <input type="password" name="senha_confirmation" id="senha_confirmation" class="form-control" placeholder="Confirme a senha" required>
            </div>

            <button type="submit" class="btn btn-primary">Criar Usuário</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

