<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::paginate(10);
        
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
