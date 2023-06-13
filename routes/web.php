<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
// use App\Http\Middleware\AutenticacaoMiddleware;
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
Route::post('/contato', [ContatoController::class, 'store'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

//APP
Route::group(['prefix'=>'app', 'as'=>'app.', 'middleware'=>['autenticacao']], function () {
    Route::get('/home', [HomeController::class, 'inicio'])
        ->name('home');

    Route::get('/sair', [LoginController::class, 'sair'])
        ->name('sair');

    Route::get('/clientes', [ClienteController::class, 'index'])
        ->name('clientes.index');

        Route::group(['prefix'=>'fornecedores', 'as'=>'fornecedores.'], function(){
            Route::get('/fornecedores', [FornecedorController::class, 'index'])
                ->name('index');
            Route::get('/fornecedores/create', [FornecedorController::class, 'create'])
                ->name('create');
            Route::post('/fornecedores/store', [FornecedorController::class, 'store'])
                ->name('store');
            Route::get('/fornecedores/{fornecedor}/show', [FornecedorController::class, 'show'])
                ->name('show');
            Route::get('/fornecedores/{fornecedor}/edite', [FornecedorController::class, 'edite'])
                ->name('edite');
            Route::put('/fornecedores/{fornecedor}/update', [FornecedorController::class, 'update'])
                ->name('update');
            Route::get('/fornecedores/{fornecedor}/destroy', [FornecedorController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'produtos', 'as'=>'produtos.'], function(){
            Route::get('/produtos', [ProdutoController::class, 'index'])
                ->name('index');
            Route::get('/produtos/create', [ProdutoController::class, 'create'])
                ->name('create');
            Route::post('/produtos/store', [ProdutoController::class, 'store'])
                ->name('store');
            Route::get('/produtos/{produto}/show', [ProdutoController::class, 'show'])
                ->name('show');
            Route::get('/produtos/{produto}/edite', [ProdutoController::class, 'edite'])
                ->name('edite');
            Route::put('/produtos/{produto}/update', [ProdutoController::class, 'update'])
                ->name('update');
            Route::get('/produtos/{produto}/destroy', [ProdutoController::class, 'destroy'])
                ->name('destroy');
        });
    
});

Route::fallback( function() {
    echo" A rota acessada não existe <a href=" .Route("site.index"). ">Clique Aqui</a> para ir a pagina inicial";
});

