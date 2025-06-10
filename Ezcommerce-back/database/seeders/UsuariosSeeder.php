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
                'senha' => Hash::make('123456'),
                'telefone' => '11999990000',
                'cep' => '01001-000',
                'endereco' => 'Rua das Flores, 123',
                'bairro' => 'Centro',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Maria Souza',
                'email' => 'maria@example.com',
                'senha' => Hash::make('123456'),
                'telefone' => '21988880000',
                'cep' => '20010-000',
                'endereco' => 'Avenida Brasil, 456',
                'bairro' => 'Copacabana',
                'cidade' => 'Rio de Janeiro',
                'estado' => 'RJ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Felipe Souza',
                'email' => 'felipe@example.com',
                'senha' => Hash::make('123456'),
                'telefone' => '31977770000',
                'cep' => '30140-000',
                'endereco' => 'Rua Afonso Pena, 789',
                'bairro' => 'Funcionários',
                'cidade' => 'Belo Horizonte',
                'estado' => 'MG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Alan Zoka',
                'email' => 'alanzoka@example.com',
                'senha' => Hash::make('123456'),
                'telefone' => '41966660000',
                'cep' => '80010-000',
                'endereco' => 'Rua das Palmeiras, 321',
                'bairro' => 'Centro',
                'cidade' => 'Curitiba',
                'estado' => 'PR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Sergio Buzina',
                'email' => 'buzina@example.com',
                'senha' => Hash::make('123456'),
                'telefone' => '51955550000',
                'cep' => '90010-000',
                'endereco' => 'Avenida Ipiranga, 654',
                'bairro' => 'Cidade Baixa',
                'cidade' => 'Porto Alegre',
                'estado' => 'RS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
