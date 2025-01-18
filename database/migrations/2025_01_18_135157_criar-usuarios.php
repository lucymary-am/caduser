<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            
            // Nome: obrigatório, entre 3 e 50 caracteres
            $table->string('nome', 50); // Definido um máximo de 50 caracteres
            
            // E-mail: obrigatório, único, válido
            $table->string('email', 150)->unique(); // Único para evitar duplicações
            
            // Senha: obrigatório, entre 6 e 20 caracteres
            $table->string('senha', 60); // O campo password geralmente tem 60 caracteres devido ao hash
                        
            // Colunas padrão de timestamp (created_at e updated_at)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }

};
