@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>Estatísticas</h2>
        <p>Quantidade de usuários: {{ $qtd_usuarios }}</p>
        <p>Quantidade de bibliotecas: {{ $qtd_bibliotecas }}</p>
        <p>Quantidade de livros: {{ $qtd_livros }}</p>
        <p>Quantidade de comentários: {{ $qtd_comentarios }}</p>
        <p>Quantidade de emprestimos: {{ $qtd_emprestimos }}</p>

        <h2>Cadastrar tema</h2>
        <form action="{{ route('register.temas') }}" method="post">
            @csrf
            <div class="col-md-12">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        <hr>
        <h2>Cadastrar livro</h2>

        <form action="{{ route('register.livros') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 d-flex">
                <div class="col-md-6">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Autor</label>
                    <select name="autor" class="form-control">
                        @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}" class="form-control">{{ $autor->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Tema</label>
                    <select name="tema_id" class="form-control">
                        @foreach ($temas as $tema)
                            <option value="{{ $tema->id }}" class="form-control">{{ $tema->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="col-md-12 d-flex">
                <div class="col-md-8 ">
                    <label>Sinopse</label>
                    <textarea class="form-control" name="sinopse"></textarea>
                </div>
                <div class="col-md-4">
                    <label>Capa do livro</label>
                    <input type="file" class="form-control" name="capa">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        <hr>
        <h2>Cadastrar autor</h2>
        <form action="{{ route('register.autores') }}" method="post">
            @csrf
            <div class="col-md-12 d-flex">
                <div class="col-md-6">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Nacionalidade</label>
                    <select name="nacionalidade" id="" class="form-control">
                        @include('layouts.optionnacionalidade')
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        <hr>
        <h2>Livros Cadastrados</h2>
        <table class="table" style="min-height: 20rem">
            <thead>
                <tr>
                    <th scope="col">Capa</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($livros))
                    @foreach ($livros as $livro)
                        <tr>
                            <td><img src="{{ url('/storage/' . $livro->capa) }}" style="max-width: 200px"></td>
                            <th scope="row">{{ $livro->nome }}</th>
                            <th scope="row">{{ $livro->autor->nome }}</th>
                            <th scope="row">{{ $livro->tema->nome }}</th>
                            <th scope="row">
                                <form action="/admin/delete" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value={{ $livro->id }}>
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @include('layouts.footer')
</body>

</html>
