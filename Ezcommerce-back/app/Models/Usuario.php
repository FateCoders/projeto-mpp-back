<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios'; // se sua tabela no banco for 'usuarios'
    
    protected $fillable = ['nome', 'email', 'senha'];

    protected $hidden = ['senha', 'remember_token']; // oculta a senha nas respostas JSON

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_user_fk');
    }
}
