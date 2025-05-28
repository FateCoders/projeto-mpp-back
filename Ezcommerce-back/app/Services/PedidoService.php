<?php
// app/Services/PedidoService.php
namespace App\Services;

use App\Factories\PagamentoFactory;
use App\Interfaces\PedidoInterface;

class PedidoService {
    public function processarPedido(PedidoInterface $pedido, string $metodoPagamento) {
        $pagamento = PagamentoFactory::make($metodoPagamento);
        $pagamento->pagar($pedido);
    }
}
?>