<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'senha'];

    public function pedidos() {
        return $this->hasMany(Pedido::class, 'id_user_fk');
    }
}


?>