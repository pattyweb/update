<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('representantes')->insert([
            [
                'nome' => 'Representante 1',
                'telefone' => '111111111',
                'cidade_id' => 1,
            ],
            [
                'nome' => 'Representante 2',
                'telefone' => '222222222',
                'cidade_id' => 2,
            ],
            [
                'nome' => 'Representante 3',
                'telefone' => '333333333',
                'cidade_id' => 3,
            ],
            [
                'nome' => 'Representante 4',
                'telefone' => '444444444',
                'cidade_id' => 4,
            ],
            [
                'nome' => 'Representante 5',
                'telefone' => '555555555',
                'cidade_id' => 5,
            ],
            [
                'nome' => 'Representante 6',
                'telefone' => '666666666',
                'cidade_id' => 6,
            ],
            [
                'nome' => 'Representante 7',
                'telefone' => '777777777',
                'cidade_id' => 7,
            ],
            [
                'nome' => 'Representante 8',
                'telefone' => '888888888',
                'cidade_id' => 8,
            ],
            [
                'nome' => 'Representante 9',
                'telefone' => '999999999',
                'cidade_id' => 9,
            ],
            [
                'nome' => 'Representante 10',
                'telefone' => '101010101',
                'cidade_id' => 10,
            ],
            [
                'nome' => 'Representante 11',
                'telefone' => '111111111',
                'cidade_id' => 11,
            ],
            [
                'nome' => 'Representante 12',
                'telefone' => '121212121',
                'cidade_id' => 12,
            ],
            [
                'nome' => 'Representante 13',
                'telefone' => '131313131',
                'cidade_id' => 13,
            ],
            [
                'nome' => 'Representante 14',
                'telefone' => '141414141',
                'cidade_id' => 14,
            ],
            [
                'nome' => 'Representante 15',
                'telefone' => '151515151',
                'cidade_id' => 15,
            ],
        ]);
    }
}
