<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;
    protected $table ='pedido_produto';
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'quantidade',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }
}
