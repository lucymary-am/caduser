<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6|max:20|confirmed', 
        ], [
            'email.email' => 'Informe um e-mail válido',
            'email.unique' => 'Este e-mail já está em uso. Por favor, escolha outro.',
        ])->stopOnFirstFailure(true);

        $data = $validator->validate();

        $user = new Usuario();
        $user->nome = $data['nome'];
        $user->email = $data['email'];
        $user->senha = Hash::make($data['senha']); 
        $user->save();
      
        return response()->json([
            'success' => true,
            'message' => 'Usuário cadastrado com sucesso!',
        ], 200);
    }

    public function edit($id)
    {
        $user = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:usuarios,email,' . $id,           
        ], [
            'email.email' => 'Informe um e-mail válido',
            'email.unique' => 'Este e-mail já está em uso. Por favor, escolha outro.',
        ])->stopOnFirstFailure(true);

        $data = $validator->validate();

        $usuario = Usuario::findOrFail($id);
        $usuario->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Usuário alterado com sucesso!',
        ], 200);
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
