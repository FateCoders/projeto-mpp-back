<?php
// app/Factories/PagamentoFactory.php
namespace App\Factories;

use App\Services\PagamentoCartao;
use App\Services\PagamentoPix;
use App\Interfaces\PagamentoInterface;

class PagamentoFactory {
    public static function make(string $tipo): PagamentoInterface {
        return match(strtolower($tipo)) {
            'cartao' => new PagamentoCartao(),
            'pix' => new PagamentoPix(),
            default => throw new \Exception("Método de pagamento inválido."),
        };
    }
}
?>