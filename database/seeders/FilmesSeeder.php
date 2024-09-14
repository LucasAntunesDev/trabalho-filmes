<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FilmesSeeder extends Seeder {
    public function run(): void {
        DB::table('filmes')->insert([
            [
                'nome' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'sinopse' => 'Em uma terra fantástica e única, um hobbit recebe de presente de seu tio um anel mágico e maligno que precisa ser destruído antes que caia nas mãos do mal. Para isso, o hobbit Frodo tem um caminho árduo pela frente, onde encontra perigo, medo e seres bizarros. Ao seu lado para o cumprimento desta jornada, ele aos poucos pode contar com outros hobbits, um elfo, um anão, dois humanos e um mago, totalizando nove seres que formam a Sociedade do Anel.',
                'ano' => '2001',
                'categoria' => 'Fantasia/Aventura',
                'link_trailer' => 'https://www.youtube.com/watch?v=0i86oM1nHjM',
            ],

            [
                'nome' => 'O Senhor dos Anéis: As Duas Torres',
                'sinopse' => 'Após a captura de Merry e Pippy pelos orcs, a Sociedade do Anel é dissolvida. Frodo e Sam seguem sua jornada rumo à Montanha da Perdição para destruir o anel e descobrem que estão sendo perseguidos pelo misterioso Gollum. Enquanto isso, Aragorn, o elfo e arqueiro Legolas e o anão Gimli partem para resgatar os hobbits sequestrados e chegam ao reino de Rohan, onde o rei Theoden foi vítima de uma maldição mortal de Saruman.',
                'ano' => '2002',
                'categoria' => ' Fantasia/Aventura ',
                'link_trailer' => 'https://www.youtube.com/watch?v=OQgySPQ5M3Y',
            ],

            [
                'nome' => 'O Senhor dos Anéis : O Retorno do Rei',
                'sinopse' => 'Sauron planeja um grande ataque a Minas Tirith, capital de Gondor, o que faz com que Gandalf e Pippin partam para o local na intenção de ajudar a resistência. Frodo, Sam e Gollum seguem sua viagem rumo à Montanha da Perdição para destruir o anel.',
                'ano' => '2003',
                'categoria' => ' Fantasia/Aventura ',
                'link_trailer' => 'https://www.youtube.com/watch?v=OQgySPQ5M3Y',
            ],
        ],);
    }
}
