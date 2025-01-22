<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash; 
use Tests\TestCase;

class CriarUsuarioTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Teste para verificar a criação de um usuário.
     *
     * @return void
     */
    public function test_criacao_usuario()
    {
        $faker = \Faker\Factory::create();
        $email = $faker->unique()->safeEmail;

        $dadosUsuario = [
            'nome' => $faker->name,
            'email' => $email,
            'senha' => Hash::make('teste@123'),
        ];

        $usuario = Usuario::create($dadosUsuario);

        $this->assertDatabaseHas('usuarios', [
            'email' => $email,
        ]);

        $this->assertEquals($dadosUsuario['nome'], $usuario->nome);
    }
}
