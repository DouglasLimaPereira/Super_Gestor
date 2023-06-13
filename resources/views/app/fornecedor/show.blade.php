@extends('app.layouts.base')
@section('titulo')
    Super Gestor - Fornecedor
@endsection

@section('conteudo')

    <div class="row">
        <div class="titulo-pagina-2">
            <h1>Fornecedores</h1>
        </div>
        <div class="col-md-12" style="width: 70%; margin-left: auto; margin-right: auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{$fornecedor->nome}} </h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="callout callout-info">
                                <b>ID: </b> {{$fornecedor->id}}<br>
                                <b>E-mail: </b> {!!($fornecedor->email) ? '<span class="text-primary">' . $fornecedor->email . '</span>' : '<span class="text-danger">Não informado</span>'!!}<br>
                                {{-- <b>Usuário autoriza pelo setor de engenharia ?: </b>
                                    @if ($fornecedor->pessoa->engenharia == 1)
                                        SIM
                                    @else
                                        NÃO
                                    @endif
                                <br> --}}
                                {{-- <b>Usuário autoriza pelo setor de segurança no trabalho ?: </b>
                                    @if ($fornecedor->pessoa->seguranca == 1)
                                        SIM
                                    @else
                                        NÃO
                                    @endif
                                <br> --}}
                                <b>Uf: </b> {{ $fornecedor->uf }}<br>
                                <b>Site: </b> {{$fornecedor->site}}<br>
                            </div>
                            
                            {{-- <div class="callout callout-info">
                                <b>Estado </b> 
                                {!!($usuario->active) ? '<span class="badge badge-pill badge-success">ATIVO</span>' : '<span class="badge badge-pill badge-danger">INATIVO</span>'!!}
                                    
                                { {--<br>
                                <b>Perfil </b> {!!($perfil) ? $perfil->nome : '<span class="badge badge-pill badge-danger">NÃO INFORMADO</span>' !!} --} }
                                
                                <br>
                            </div> --}}
                        </div>
                        
                        {{-- <div class="callout callout-info col-md-6 border p-2 text-center">
                            <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/{{str_replace('public', 'storage', $usuario->imagem)}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                            @if($usuario->where('imagem_origem', 'c'))
                                <img class="img-fluid" src="{{url('/')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                            @else
                                <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                            @endif
                            
                        </div> --}}
                    </div>
                    <hr>
                    <div class="dropdown-divider"></div>
                    <div class="row col-md-12">
                        <div class="mr-2">
                            <a href="{{route('app.fornecedores.index', $fornecedor->id)}}" class="btn btn-outline-danger"><i class="fas fa-undo"></i> Voltar</a>
                                        
                            {{-- @if (($fornecedor->id == auth()->usuario()->id ) || ( auth()->usuario()->companies->firstWhere('superadmin', 1))) --}}
                                
                                <a href="{{ route('app.fornecedores.edite', $fornecedor->id) }}" class="btn btn-outline-success"><i class="fas fa-edit"></i> Editar </a>
                            
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Removendo o registro --}}
<script>
    function remover(fornecedor){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/construtoras/"+company+"/funcionarios/"+funcionario+"/destroy"
        }
    }
</script>