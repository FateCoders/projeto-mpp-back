<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido as Pedido;
use App\Services\PedidoService;
use App\Decorators\EmbalagemPresenteDecorator;

class PedidoController extends Controller
{
  public function realizarPedido(Request $request)
{
    $validated = $request->validate([
        'id_user_fk' => 'required|exists:usuarios,id',
        'id_produto_fk' => 'required|exists:produtos,id',
        'valor' => 'required|numeric|min:0.01',
        'pagamento' => 'required|string|in:pix,cartao',
        'embalagem_presente' => 'boolean'
    ]);

    // Cria uma classe anônima para representar o pedido lógico
    $pedido = new class($validated['valor']) implements \App\Interfaces\PedidoInterface {
        private $valor;
        public function __construct($valor) {
            $this->valor = $valor;
        }
        public function getValor(): float {
            return $this->valor;
        }
        public function getDescricao(): string {
            return "Pedido simples";
        }
    };

    // Aplica decorator se for embalagem presente
    if (!empty($validated['embalagem_presente'])) {
        $pedido = new EmbalagemPresenteDecorator($pedido);
    }

    // Processa pagamento
    $service = new PedidoService();
    $service->processarPedido($pedido, $validated['pagamento']);

    // Salva no banco com Model Pedido Eloquent
    Pedido::create([
        'id_user_fk' => $validated['id_user_fk'],
        'id_produto_fk' => $validated['id_produto_fk'],
        'pagamento' => $validated['pagamento'],
        'valor' => $pedido->getValor(),
        'descricao' => $pedido->getDescricao(),
        'status' => 'pendente'
    ]);

    return response()->json([
        'mensagem' => 'Pedido processado com sucesso!',
        'descricao' => $pedido->getDescricao(),
        'valor_final' => $pedido->getValor()
    ]);
}


    public function listarPedidos()
    {
        return response()->json(Pedido::with(['usuario', 'produto'])->get());
    }

    public function verPedido($id)
    {
        $pedido = Pedido::with(['usuario', 'produto'])->findOrFail($id);
        return response()->json($pedido);
    }
}
