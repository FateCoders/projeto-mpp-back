<?php
// app/Adapters/FreteServiceAdapter.php
namespace App\Adapters;

class FreteAPIExterna {
    public function calcularFrete(string $cep) {
        return "R$ 25.00 para o CEP $cep";
    }
}

class FreteServiceAdapter {
    protected $api;

    public function __construct() {
        $this->api = new FreteAPIExterna();
    }

    public function calcular(string $cep) {
        return $this->api->calcularFrete($cep);
    }
}
?>