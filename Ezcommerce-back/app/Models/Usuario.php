<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome', 
        'email', 
        'senha',
        'telefone',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'estado'
    ];

    protected $hidden = ['senha', 'remember_token'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_user_fk');
    }
}
