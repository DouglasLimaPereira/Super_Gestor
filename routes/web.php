<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
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
            Route::get('/', [FornecedorController::class, 'index'])
                ->name('index');
            Route::get('create', [FornecedorController::class, 'create'])
                ->name('create');
            Route::post('store', [FornecedorController::class, 'store'])
                ->name('store');
            Route::get('{fornecedor}/show', [FornecedorController::class, 'show'])
                ->name('show');
            Route::get('{fornecedor}/edite', [FornecedorController::class, 'edite'])
                ->name('edite');
            Route::put('{fornecedor}/update', [FornecedorController::class, 'update'])
                ->name('update');
            Route::get('{fornecedor}/destroy', [FornecedorController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'produtos', 'as'=>'produtos.'], function(){
            Route::get('/', [ProdutoController::class, 'index'])
                ->name('index');
            Route::get('create', [ProdutoController::class, 'create'])
                ->name('create');
            Route::post('store', [ProdutoController::class, 'store'])
                ->name('store');
            Route::get('{produto}/show', [ProdutoController::class, 'show'])
                ->name('show');
            Route::get('{produto}/edite', [ProdutoController::class, 'edite'])
                ->name('edite');
            Route::put('{produto}/update', [ProdutoController::class, 'update'])
                ->name('update');
            Route::get('{produto}/destroy', [ProdutoController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'produto-detalhe', 'as'=>'produto-detalhe.'], function(){
            Route::get('/', [ProdutoDetalheController::class, 'index'])
                ->name('index');
            Route::get('create', [ProdutoDetalheController::class, 'create'])
                ->name('create');
            Route::post('store', [ProdutoDetalheController::class, 'store'])
                ->name('store');
            Route::get('{produto_detalhe}/show', [ProdutoDetalheController::class, 'show'])
                ->name('show');
            Route::get('{produto_detalhe}/edite', [ProdutoDetalheController::class, 'edite'])
                ->name('edite');
            Route::put('{produto_detalhe}/update', [ProdutoDetalheController::class, 'update'])
                ->name('update');
            Route::get('{produto_detalhe}/destroy', [ProdutoDetalheController::class, 'destroy'])
                ->name('destroy');
        });
});

Route::fallback( function() {
    echo" A rota acessada não existe <a href=" .Route("site.index"). ">Clique Aqui</a> para ir a pagina inicial";
});

