<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FilmesSeeder extends Seeder {
    public function run(): void {
        DB::table('filmes')->insert([
            'nome' => 'O Senhor dos Anéis : O Retorno do Rei',
            'sinopse' => 'Sauron planeja um grande ataque a Minas Tirith, capital de Gondor, o que faz com que Gandalf e Pippin partam para o local na intenção de ajudar a resistência. Frodo, Sam e Gollum seguem sua viagem rumo à Montanha da Perdição para destruir o anel.',
            'ano' => '2005',
            'categoria' => 'Aventura',
            // 'imagem' => '',
            'link_trailer' => 'https://www.youtube.com/watch?v=OQgySPQ5M3Y',
        ],);
    }
}
