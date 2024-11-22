@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem;">
        <h1>Meu perfil</h1>
        <img src="{{ url('/storage/' . $user->foto) }}" style="max-width: 128px;">
        <br>
        <br>
        <label>Trocar foto</label>
        <form action="/user/foto/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-3">
                <input type="file" name="foto" class="form-control">
            </div>
            <br>
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-success">Enviar</button>
                <a href="/user/foto/delete" class="btn btn-danger">Excluir Foto</a>
            </div>
        </form>
        <form action="" method="put">
            <br>
            <div class="col-md-12" style="display: flex">
                <div class="col-md-12">
                    <label>Nome</label>
                    <input type="text" name="biblioteca_name" class="form-control" value="{{ $user->name }}">
                </div>
            </div>
            <br>
            <div class="col-md-12" style="display: flex">
                <div class="col-md-12">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value={{ $user->email }}>
                </div>
            </div>
            <br>
            <div class="col-md-12" style="display: flex">
                <div class="col-md-3">
                    <label>CEP</label>
                    <input type="text" name="cep" class="form-control" value="{{ $user->cep }}">
                </div>
                <div class="col-md-6">
                    <label>Logradouro</label>
                    <input type="text" name="biblioteca_logradouro" class="form-control"
                        value="{{ $user->logradouro }}">
                </div>
                <div class="col-md-3">
                    <label>Cidade</label>
                    <input type="text" name="biblioteca_cidade" class="form-control" value="{{ $user->cidade }}">
                </div>
            </div>
            <br>
            <div class="col-md-12" style="display: flex">
                <div class="col-md-3">
                    <label>Bairro</label>
                    <input type="text" name="biblioteca_bairro" class="form-control" value="{{ $user->bairro }}">
                </div>
                <div class="col-md-3">
                    <label>Estado</label>
                    <select id="estado" class="form-control" name="estado" value="{{ $user->estado }}">
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
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>
    <script>
        $("input[name=cep]").blur(function() {
            var cep = $(this).val().replace(/[^0-9]/, '');
            if (cep) {
                var url = 'https://viacep.com.br/ws/' + cep + '/json/';
                $.ajax({
                    url: url,
                    dataType: 'jsonp',
                    crossDomain: true,
                    contentType: "application/json",
                    success: function(json) {
                        if (json.logradouro) {
                            $("input[name=biblioteca_logradouro]").val(json.logradouro);
                            $("input[name=biblioteca_bairro]").val(json.bairro);
                            $("input[name=biblioteca_cidade]").val(json.localidade);
                            $("input[name=estado]").val(json.uf);
                        }
                    }
                });
            }
        });
    </script>
    @include('layouts.footer')
</body>
