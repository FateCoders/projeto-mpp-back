<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            'roupas' => [
                ['nome' => 'Conjunto Calça,Blusa e Bota ', 'descricao' => 'Conjunto de Calça,Blusa e Bota confortável.', 'preco' => 79.90, 'quantidade' => 100],
                ['nome' => 'Camisa Básica', 'descricao' => 'Camisa básica.', 'preco' => 120.00, 'quantidade' => 80],
                ['nome' => 'Jaqueta Marrom', 'descricao' => 'Jaqueta estilosa e resistente.', 'preco' => 250.00, 'quantidade' => 30],
                ['nome' => 'Conjunto Camisetas Básicas', 'descricao' => 'Conjunto de Camisetas básicas.', 'preco' => 40.00, 'quantidade' => 150],
            ],
            'casa' => [
                ['nome' => 'Fogão 4 bocas', 'descricao' => 'Fogão 4 bocas a gás.', 'preco' => 699.90, 'quantidade' => 50],
                ['nome' => 'Sofá 3 Lugares', 'descricao' => 'Sofá de 3 lugares confortável.', 'preco' => 389.90, 'quantidade' => 60],
                ['nome' => 'Mesa de Jantar 8 Lugares', 'descricao' => 'Mesa de Jantar de 8 lugares.', 'preco' => 300.00, 'quantidade' => 25],
                ['nome' => 'Armário para Louças', 'descricao' => 'Armário para Louças.', 'preco' => 205.00, 'quantidade' => 200],
            ],
            'brinquedos' => [
                ['nome' => 'Playmobil Cidade Feliz', 'descricao' => 'Peças de Playmobil para representar uma cidade', 'preco' => 150.00, 'quantidade' => 40],
                ['nome' => 'Carrinho anos 60', 'descricao' => 'Carrinho modelo Mini Cooper S de 1967.', 'preco' => 120.00, 'quantidade' => 70],
                ['nome' => 'Bonecos Colecionáveis Mario', 'descricao' => 'Bonecos Colecionaveis do universo do Mario.', 'preco' => 80.00, 'quantidade' => 90],
                ['nome' => 'Pista de Trem', 'descricao' => 'Pista de trem, com itens da imagem incluso.', 'preco' => 30.00, 'quantidade' => 80],
            ],
            'eletronicos' => [
                ['nome' => 'Notebook 32gb de Ram, Intel 10100f,Ssd 480gb', 'descricao' => 'Notebook de última geração', 'preco' => 2500.00, 'quantidade' => 20],
                ['nome' => 'Smartwatch', 'descricao' => 'Relógio inteligente.', 'preco' => 800.00, 'quantidade' => 15],
                ['nome' => 'TV Smart', 'descricao' => 'Televisão com funcionalidade SmartTv', 'preco' => 3500.00, 'quantidade' => 35],
                ['nome' => 'Smartphone', 'descricao' => 'Celular com alta resolução.', 'preco' => 900.00, 'quantidade' => 40],
            ],
        ];

        foreach ($categorias as $categoria => $produtos) {
            foreach ($produtos as $index => $produto) {
                // Supondo que as imagens estejam em public/images/{categoria}/produto{n}.jpg
                $urlImagem = url("images/{$categoria}/produto" . ($index + 1) . ".jpg");

                DB::table('produtos')->insert([
                    'nome' => $produto['nome'],
                    'categoria' => $categoria,
                    'descricao' => $produto['descricao'],
                    'preco' => $produto['preco'],
                    'quantidade' => $produto['quantidade'],
                    'imagem' => $urlImagem, // Alterado para imagem_url em vez de imagem_base64
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
