<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nome' => 'João Silva',
                'email' => 'joao@example.com',
                'senha' => Hash::make('123456'), // criptografa a senha
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Maria Souza',
                'email' => 'maria@example.com',
                'senha' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Felipe Souza',
                'email' => 'felipe@example.com',
                'senha' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Alan Zoka',
                'email' => 'alanzoka@example.com',
                'senha' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Sergio Buzina',
                'email' => 'buzina@example.com',
                'senha' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
