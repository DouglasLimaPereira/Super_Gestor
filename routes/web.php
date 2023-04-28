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
//SITE
Route::get('/', [HomeController::class,'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobre_nos'])->name('site.sobre-nos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){
    return 'Login';    
})->name('site.login');;

//APP
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function() { return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function(){ return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos'; })->name('app.produtos');
});

Route::fallback( function() {
    echo" A rota acessada não existe <a href=" .Route("site.index"). ">Clique Aqui</a> para ir a pagina inicial";
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
