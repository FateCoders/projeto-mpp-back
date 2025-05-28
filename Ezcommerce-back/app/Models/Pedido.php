<?php
// app/Models/Pedido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\PedidoInterface;

class Pedido extends Model implements PedidoInterface
{
    protected $fillable = [
        'id_user_fk',
        'id_produto_fk',
        'pagamento',
        'valor',
        'descricao',
        'status',
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_user_fk');
    }

    public function produto() {
        return $this->belongsTo(Produto::class, 'id_produto_fk');
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getValor(): float {
        return $this->valor;
    }
}
