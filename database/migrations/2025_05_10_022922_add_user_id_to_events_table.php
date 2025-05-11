<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            # Apartir de fazermos a migration usaremos o 'foreignId()'; apartir desse metodo, conseguiremos cria uma tabela para o id de usuariosç
            # E o 'constrained()' insere uma chave estrangueira e atrela ela a um usuario de uma outra tabela 
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            # Aq iremos passar o "onDelete('cascade') para possamos deletar os registro q estão atrelado ao usuario, para q nao possa ter "um filho sem o pai"
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};
