<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('usuarios')->insert([
            'nome' => 'admin',
            'usuario' => 'admin',
            'senha' => Hash::make('admin'),
            'admin' => 1,
        ],);
    }
}
