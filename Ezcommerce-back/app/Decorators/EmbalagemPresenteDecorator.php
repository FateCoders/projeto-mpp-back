<?php
namespace App\Decorators;
// app/Decorators/EmbalagemPresenteDecorator.php

use App\Interfaces\PedidoInterface;

class EmbalagemPresenteDecorator implements PedidoInterface {
    protected PedidoInterface $pedido;

    public function __construct(PedidoInterface $pedido) {
        $this->pedido = $pedido;
    }

    public function getDescricao(): string {
        return $this->pedido->getDescricao() . " + Embalagem para presente";
    }

    public function getValor(): float {
        return $this->pedido->getValor() + 5.0;
    }
}
?>