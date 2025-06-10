<?php

namespace App\Http\Controllers;
use App\Models\Produto;
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
        'pagamento' => 'required|string|in:pix,cartao',
        'embalagem_presente' => 'boolean'
    ]);

    // Busca o valor do produto com base no id fornecido
    $produto = Produto::findOrFail($validated['id_produto_fk']);
    $valorProduto = $produto->preco;

    // Cria um pedido simples com o valor do produto
    $pedido = new class($valorProduto) implements \App\Interfaces\PedidoInterface {
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

    // Aplica o decorator se for embalagem presente
    if (!empty($validated['embalagem_presente'])) {
        $pedido = new EmbalagemPresenteDecorator($pedido);
    }

    // Processa o pagamento
    $service = new PedidoService();
    $service->processarPedido($pedido, $validated['pagamento']);

    // Salva no banco
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

public function confirmarCompra(Request $request, $id)
{
    // Busca o pedido
    $pedido = Pedido::findOrFail($id);

    // Verifica se o pedido já está confirmado
    if ($pedido->status === 'confirmado') {
        return response()->json([
            'mensagem' => 'Este pedido já foi confirmado.'
        ], 200);
    }

    // Atualiza o status
    $pedido->status = 'confirmado';
    $pedido->save();

    return response()->json([
        'mensagem' => 'Compra confirmada com sucesso!',
        'pedido' => $pedido
    ], 200);
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
    public function verPedidosByUserId($id)
{
    $pedidos = Pedido::with(['usuario', 'produto'])
        ->where('id_user_fk', $id)
        ->get();

    if ($pedidos->isEmpty()) {
        return response()->json(['mensagem' => 'Nenhum pedido encontrado para este usuário.'], 404);
    }

    return response()->json($pedidos);
}

}
