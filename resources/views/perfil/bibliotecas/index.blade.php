@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem;">
        <h1>Meu perfil</h1>
        <form action="" method="put">
            <div class="col-md-12" style="display: flex">
                <div class="col-md-12">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ $biblioteca->nome }}">
                </div>
            </div>
            <br>
            <div class="col-md-12" style="display: flex">
                <div class="col-md-6">
                    <label>Logradouro</label>
                    <input type="text" name="logradouro" class="form-control" value={{ $biblioteca->logradouro }}>
                </div>
                <div class="col-md-3">
                    <label>Cidade</label>
                    <input type="text" name="logradouro" class="form-control" value={{ $biblioteca->cidade }}>
                </div>
                <div class="col-md-3">
                    <label>Estado</label>
                    <select id="estado" class="form-control" name="estado" value={{ $biblioteca->estado }}>
                        <option value="" selected disabled hidden>Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="col-md-12" style="display: flex">
                <div class="col-md-3">
                    <label>CEP</label>
                    <input type="text" name="cep" class="form-control" value="{{ $biblioteca->valor }}">
                </div>
                <div class="col-md-3">
                    <label>É uma escola?</label>
                    <select name="escola" class="form-control" value="{{ $biblioteca->escola }}">
                        <option value="0">Não sou uma escola</option>
                        <option value="1">Sou uma escola</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
        <hr>
        <h1>Minhas fotos</h1>
        <form action="{{ route('bibliotecas.store_fotos') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label>Envie suas fotos!</label>
            <input type="file" name="foto" class="form-control">
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
            <br>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
        <br>
        <table class="table" style="min-height: 20rem">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fotos as $foto)
                    <tr>
                        <th scope="row">{{ $foto->id }}</th>
                        <td><img src="{{ $foto->foto }}" style="max-width: 200px"></td>
                        <th scope="row">
                            <form action="{{ route('bibliotecas.delete_foto') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $foto->id }}">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('layouts.footer')
</body>
