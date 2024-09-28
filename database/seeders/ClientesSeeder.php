<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'Cliente 1',
                'cpf' => '123.456.789-00',
                'data_nascimento' => '1985-01-01',
                'sexo' => 'Masculino',
                'endereco' => 'Rua Exemplo, 123',
                'email' => 'cliente1@exemplo.com',
                'telefone' => '99999-1111',
                'cidade_id' => 1,
            ],
            [
                'nome' => 'Cliente 2',
                'cpf' => '234.567.890-11',
                'data_nascimento' => '1990-02-02',
                'sexo' => 'Feminino',
                'endereco' => 'Avenida Exemplo, 456',
                'email' => 'cliente2@exemplo.com',
                'telefone' => '99999-2222',
                'cidade_id' => 2,
            ],
            // Adicione mais clientes conforme necessário
        ]);
    }
}

