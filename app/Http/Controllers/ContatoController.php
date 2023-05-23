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
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000',
        ]);

        return view('site.contato', compact('request'));
    }
}
