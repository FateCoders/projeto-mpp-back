<?php
// app/Interfaces/PagamentoInterface.php
namespace App\Interfaces;

use App\Models\Pedido;

interface PagamentoInterface {
    public function pagar(Pedido $pedido);
}

?>