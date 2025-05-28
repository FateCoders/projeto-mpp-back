<?php
// app/Services/PagamentoCartao.php
namespace App\Services;

use App\Interfaces\PagamentoInterface;
use App\Interfaces\PedidoInterface;

class PagamentoCartao implements PagamentoInterface {
    public function pagar(PedidoInterface $pedido) {
        echo "Pagamento com Cartão de R$" . $pedido->getValor();
    }
}
?>