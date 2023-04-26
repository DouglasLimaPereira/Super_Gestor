<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'principal']);

Route::get('/sobre-nos', [SobreNosController::class, 'sobre_nos']);

Route::get('/contato', [ContatoController::class, 'contato']);

Route::get('/login', function(){
    return 'Login';    
});
Route::get('/clientes', function(){
    return 'Clientes';    
});
Route::get('/fornecedores', function(){
    return 'Fornecedores';    
});
Route::get('/produtos', function(){
    return 'Produtos';    
});


// Route::get(
//     '/contato/{nome}/{categoria}/{assunto}/{mensagem}/',
//     function(
//         string $nome, 
//         string $categoria, 
//         string $assunto, 
//         string $mensagem
//     ) {
//         echo 'Nome: ',$nome,' - Categoria: ',$categoria,' -  Assunto: ',$assunto,' - Mensagem: ',$mensagem;
//     }
// );
