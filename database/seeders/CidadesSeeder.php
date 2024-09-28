<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cidades')->insert([
            ['nome' => 'Cidade 1'],
            ['nome' => 'Cidade 2'],
            ['nome' => 'Cidade 3'],
            ['nome' => 'Cidade 4'],
            ['nome' => 'Cidade 5'],
            ['nome' => 'Cidade 6'],
            ['nome' => 'Cidade 7'],
            ['nome' => 'Cidade 8'],
            ['nome' => 'Cidade 9'],
            ['nome' => 'Cidade 10'],
            ['nome' => 'Cidade 11'],
            ['nome' => 'Cidade 12'],
            ['nome' => 'Cidade 13'],
            ['nome' => 'Cidade 14'],
            ['nome' => 'Cidade 15'],
        ]);
    }
}

