<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        // $clientes = Cliente::paginate(10);
        $clientes = [];
        
        return view('app.cliente.index', compact('clientes'));
    }
}
