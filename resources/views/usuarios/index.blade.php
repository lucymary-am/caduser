@extends('layouts.app')

@section('title', 'Lista de Usuários')

@section('opcoes')
    <a href="{{ route('usuarios.create') }}" class="btn btn-success">Novo Usuário</a>
@endsection

@section('content')


    @if ($users->isEmpty())
        <div class="alert alert-warning">
            Não há usuários cadastrados no momento.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->nome }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('usuarios.delete', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
