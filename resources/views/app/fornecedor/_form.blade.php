@extends('app.layouts.base')
@section('titulo')
    Super Gestor - Fornecedor
@endsection
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Criar Fornecedor</h1>
        </div>
        <div class="menu">
            <ul>
                <li> <a href="">Novo</a> </li>
                <li> <a href="">Consultar</a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;" class="contato-principal">
                <form action="" method="POST">
                    
                        <div class="div-col">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nome" placeholder="Nome" id="nome">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
                        <br>
                        
                        <div class="div-col">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="site" placeholder="Site" id="site">
                                <label for="site">Site</label>
                            </div>
                        </div>
                        <br>

                        <div class="div-col">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="uf" placeholder="UF" id="uf">
                                <label for="uf">UF</label>
                            </div>
                        </div>
                        <br>

                        <div class="div-col">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" placeholder="E-mail" id="email">
                                <label for="email">E-mail</label>
                            </div>
                        </div>
                        <br>
                    <button type="submit" class="btn btn-success form-control">Pesquisar</button>
                </form>
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection