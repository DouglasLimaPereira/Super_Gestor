<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fornecedor_id',
        'nome',
        'peso',
        'descricao',
        'unidade_id',
    ];

    public function detalhes()
    {
        return $this->hasOne(Produtodetalhe::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class)->withPivot('created_at', 'updated_at');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
