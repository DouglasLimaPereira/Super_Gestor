<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome' => 'require|min:3',
        'site' => 'require|min:3',
        'uf' => 'require|max:2',
        'email' => 'require|email',
    ];
}
