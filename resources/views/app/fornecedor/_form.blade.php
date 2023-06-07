
<div style="width: 30%; margin-left: auto; margin-right: auto;" class="contato-principal">
    @if(isset($fornecedor))
    <form action="{{route('app.fornecedores.update')}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('app.fornecedores.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
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