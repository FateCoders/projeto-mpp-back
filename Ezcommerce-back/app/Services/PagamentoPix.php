<?php
// app/Services/PagamentoCartao.php
namespace App\Services;

use App\Interfaces\PagamentoInterface;
use App\Interfaces\PedidoInterface;

class PagamentoPix implements PagamentoInterface {
    public function pagar(PedidoInterface $pedido) {
        echo "Pagamento com Pix de R$" . $pedido->getValor();
    }
}

?>