<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome' => 'require|min:3',
        'telefone' => 'require|min:11',
        'email' => 'require|email',
        'motivo_contato' => 'require|min:3',
        'mensagem' => 'require|min:3',
    ];
}
