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
                    'name' => 'admin',
                    'username' => 'admin',
                    'password' => Hash::make('admin'),
                    'admin' => 1,
                ],
                [
                    'name' => 'user',
                    'username' => 'user',
                    'password' => Hash::make('user'),
                    'admin' => 0,
                ]
            ],
        );
    }
}
