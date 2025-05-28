<?php
namespace App\Models;
 use Illuminate\Database\Eloquent\Model;
class Produto extends Model
{
    protected $fillable = ['nome', 'categoria', 'descricao', 'preco', 'quantidade'];

    public function pedidos() {
        return $this->hasMany(Pedido::class, 'id_produto_fk');
    }
}
?>