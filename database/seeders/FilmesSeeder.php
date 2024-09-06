<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FilmesSeeder extends Seeder
{
    public function run(): void {
        DB::table('filmes')->insert([
            'nome' => 'O Senhor dos Anéis : O Retorno do Rei',
            'sinopse' => '',
            'ano' => '2005',
            'categoria' => '',
            // 'imagem' => '',
            'link_trailer' => '',
        ],);
    }
}
