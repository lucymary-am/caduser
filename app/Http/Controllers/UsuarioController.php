<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash; 

class UsuarioController extends Controller
{
    public function index()
    {
        // Buscar todos os usuários
        $users = Usuario::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6|max:20|confirmed', // 'confirmed' exige o campo 'password_confirmation'
        ]);

        // Criar o usuário com os dados validados
        $user = new Usuario();
        $user->nome = $validatedData['nome'];
        $user->email = $validatedData['email'];
        $user->senha = Hash::make($validatedData['senha']); // Criptografa a senha
        $user->save();

        return redirect()->route('users.index');
    }
}
