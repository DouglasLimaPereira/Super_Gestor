<?php

namespace App\Http\Controllers;

use App\Models\Motivocontato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = Motivocontato::all();
        return view('site.contato', compact('request', 'motivo_contatos'));
    }

    public function store( Request $request){

        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivocontato_id' => 'required',
            'mensagem' => 'required|max:2000',
        ],
        [
            'nome.require' => 'O campo nome precisa ser preenchido', 
        ]
        );
        // dd($request->all());
        SiteContato::create($request->all());

        return redirect()->route('site.index')->with('sucsses', 'Registro criado com sucesso.');
    }
}
