<?php
// app/Models/Pedido.php
namespace App\Models;

use App\Interfaces\PedidoInterface;

class Pedido implements PedidoInterface {
    public float $valor;

    public function __construct($valor) {
        $this->valor = $valor;
    }

    public function getDescricao(): string {
        return "Pedido basico";
    }

    public function getValor(): float {
        return $this->valor;
    }
}
?>