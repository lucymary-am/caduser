<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash; 

class UsuarioController extends Controller
{
    public function index()
    {
        $users = Usuario::all();
        return view('usuarios.index', compact('users'));
    }
    
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6|max:20|confirmed', 
        ], [
            'email.email' => 'Informe um e-mail válido',
            'email.unique' => 'Este e-mail já está em uso. Por favor, escolha outro.',
        ]);

        $user = new Usuario();
        $user->nome = $validatedData['nome'];
        $user->email = $validatedData['email'];
        $user->senha = Hash::make($validatedData['senha']); 
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');;
    }

    public function edit($id)
    {
        $user = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:usuarios,email,' . $id,           
        ], [
            'email.email' => 'Informe um e-mail válido',
            'email.unique' => 'Este e-mail já está em uso. Por favor, escolha outro.',
        ]);
        
        $usuario = Usuario::findOrFail($id);
        $usuario->update($validatedData);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');;
    }

    public function delete($id)
    {
        // Buscar o registro
        $usuario = Usuario::findOrFail($id);

        // Excluir o registro
        $usuario->delete();

        // Retornar uma resposta ou redirecionar
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }

}
