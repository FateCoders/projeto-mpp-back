<?php
// app/Http/Controllers/PedidoController.php
namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Services\PedidoService;
use App\Decorators\EmbalagemPresenteDecorator;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function realizarPedido(Request $request)
    {
        $pedido = new Pedido($request->input('valor'));

        if ($request->boolean('embalagem_presente')) {
            $pedido = new EmbalagemPresenteDecorator($pedido);
        }

        $service = new PedidoService();
        $service->processarPedido($pedido, $request->input('metodo_pagamento'));

        return response()->json([
            'mensagem' => 'Pedido processado com sucesso.',
            'descricao' => $pedido->getDescricao(),
            'valor_final' => $pedido->getValor()
        ]);
    }
}
?>