<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        // $produtos = Produto::paginate(10);
        $produtos = [];
        return view('app.produto.index', compact('produtos'));
    }
}