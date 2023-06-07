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

    public function create()
    {
        $fornecedores = Fornecedor::paginate(10);
        
        return view('app.fornecedor.create', compact('fornecedores'));
    }

    public function show(Request $request)
    {
        $fornecedores = Fornecedor::paginate(10);
        
        return view('app.fornecedor.edit', compact('fornecedores'));
    }
}
