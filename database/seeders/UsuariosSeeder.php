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
        DB::table('usuarios')->insert(
            [
                [
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'username' => 'admin',
                    'password' => Hash::make('123'),
                    'admin' => 1,
                ],
                [
                    'name' => 'Usuário',
                    'email' => 'user@user.com',
                    'username' => 'usuario',
                    'password' => Hash::make('usuario'),
                    'admin' => 0,
                ],
            ],
        );
    }
}
