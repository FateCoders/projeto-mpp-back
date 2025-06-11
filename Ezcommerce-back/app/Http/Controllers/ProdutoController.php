<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // 1. Listar todos os produtos
    public function index()
    {
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    // 2. Filtrar produtos por categoria (string)
    public function porCategoria($categoria)
    {
        $produtos = Produto::where('categoria', $categoria)->get();

        if ($produtos->isEmpty()) {
            return response()->json(['mensagem' => 'Nenhum produto encontrado para esta categoria.'], 404);
        }

        return response()->json($produtos);
    }
}


