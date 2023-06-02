<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        
        if($request['erro'] == 1){
            $erro = 'Usuário ou Senha estão incorretos';
        }
        return view('site.login', compact('erro'));
    }

    public function autenticar(Request $request){
        $request->validate(
            [
                'usuario' => 'email',
                'senha' => 'required',
            ],
            [
                'usuario.email' => 'O campo usuário precisa ser um e-mail válido',
                'senha.required' => 'O campo senha precisa ser preenchido',
            ]
        );

        $email = $request['usuario'];
        $senha = $request['senha'];

        echo "Usuário: $email <br> Senha: $senha";

        $user = User::where('email', $email)->where('password', $senha)->first();
        if ($user) {
            
        } else {
            $erro = 1;
            return redirect()->route('site.login', compact('erro'));
        }
    }
}
