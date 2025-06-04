<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosSeeder extends Seeder
{
    public function run()
    {
        DB::table('pedidos')->insert([
            [
                'id_user_fk' => 1, // João Silva
                'id_produto_fk' => 2, // Tênis Esportivo
                'pagamento' => 'Cartão de Crédito',
                'valor' => 199.90,
                'descricao' => 'Pedido para corrida',
                'status' => 'pendente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user_fk' => 2, // Maria Souza
                'id_produto_fk' => 1, // Camisa Polo
                'pagamento' => 'Boleto',
                'valor' => 79.90,
                'descricao' => 'Pedido de camisa',
                'status' => 'pendente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
