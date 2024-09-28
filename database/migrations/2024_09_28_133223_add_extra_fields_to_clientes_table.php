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
        Schema::table('clientes', function (Blueprint $table) {
            //$table->string('cpf')->unique()->after('nome');
            $table->date('data_nascimento')->nullable()->after('cpf');
            $table->enum('sexo', ['Masculino', 'Feminino'])->after('data_nascimento');
            $table->string('endereco')->after('sexo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
};
