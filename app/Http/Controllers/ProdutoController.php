<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::cursorPaginate(10);
        $msg = $request['msg'];
        $type = $request['type'];
        return view('app.produto.index', compact('produtos', 'type', 'msg'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        
        return view('app.produto.create', compact('unidades'));
    }

    public function edite(Request $request, Produto $produto)
    {
        $unidades = Unidade::all();
        
        return view('app.produto.edite', compact('unidades', 'produto'));
    }

    public function show(Request $request, Produto $produto)
    {
        return view('app.produto.show', compact('produto'));
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

        if (Produto::where('email', $request->email)->first()) {
            return back()->withErrors('Nome de usuário já utilizado');
        }
        
        try {
            Produto::create($request->all());
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

    public function update(Request $request, Produto $produto){
        if (Produto::where('id', '!=', $produto->id)->where('email', $request->email)->first()) {
            return back()->with('error', 'E-mail em uso!');
        }
        DB::beginTransaction();
        try {
            $produto->update($request->all());
            DB::commit();
            return redirect()->route('app.fornecedores.edite', $produto->id)->with('success', 'Fornecedor atualizado com sucesso!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Atualização não realizada!');
        }
    }

    public function destroy(Produto $produto){
        
        DB::beginTransaction();
        try {
            $produto->delete();
            DB::commit();
            return redirect()->route('app.fornecedores')->with('success', 'Fornecedor atualizado com sucesso!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Atualização não realizada!');
        }
    }
}