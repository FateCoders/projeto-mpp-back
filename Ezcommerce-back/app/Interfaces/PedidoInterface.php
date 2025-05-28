<?php
// app/Interfaces/PedidoInterface.php
namespace App\Interfaces;

interface PedidoInterface {
    public function getDescricao(): string;
    public function getValor(): float;
}
?>