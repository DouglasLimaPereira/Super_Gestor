<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(Request $request)
    {
        $fornecedores = Fornecedor::paginate(10);
        $msg = $request['msg'];
        $type = $request['type'];
        return view('app.fornecedor.index', compact('fornecedores', 'type', 'msg'));
    }

    public function create()
    {
        $fornecedores = Fornecedor::paginate(10);
        
        return view('app.fornecedor.create', compact('fornecedores'));
    }

    public function edite(Request $request, Fornecedor $fornecedor)
    {
        // $fornecedor = Fornecedor::firstWhere('id', $fornecedor);
        
        return view('app.fornecedor.edite', compact('fornecedor'));
    }

    public function show(Request $request, Fornecedor $fornecedor)
    {
        return view('app.fornecedor.show', compact('fornecedor'));
    }

    public function store(Request $request)
    {
        $msg = '';
        $type = '';
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'email' => 'required|email',
            'uf' => 'required|min:2|max:2',
        ],
        [
            'nome.required' => 'O campo nome precisa ser preenchido', 
            'nome.min' => 'O campo nome precisa ter no minino 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no maximo 40 caracteres',

            'site.required' => 'O campo site precisa ser preenchido',
            'email.required' => 'O campo email precisa ser preenchido',
            'email.email' => 'O campo e-mail precisa ser um e-mail válido',
            'uf.required' => 'O campo mensagem precisa ser preenchido',
            'uf.min' => 'O campo uf precisa ter no minino 2 caracteres',
            'uf.max' => 'O campo uf precisa ter no maximo 2 caracteres',
        ]
        );
        
        try {
            Fornecedor::create($request->all());
        } catch (\Throwable $th) {
            $msg = 'Falha ao realizar cadastro';
            $type = 'info';
            dd($th);
            return redirect()->route('app.fornecedores',compact('msg', 'type'));
        }

        $type = 'success';
        $msg = 'Cadastro realizado com sucesso!';
        return redirect()->route('app.fornecedores',compact('msg', 'type'));
    }
}
