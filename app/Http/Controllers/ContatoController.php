<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request){
        return view('site.contato', compact('request'));
    }

    public function store( Request $request){

        $request->validate([
            
        ]);

        return view('site.contato', compact('request'));
    }
}
