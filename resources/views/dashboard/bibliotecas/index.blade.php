@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>Cadastrar livro</h2>
        <form action="{{ route('register.estoque') }}" method="post">
            @csrf
            <div>
                <label>Livro</label>
                <select name="livro_id" id="" class="form-control">
                    @foreach ($livros as $livro)
                        <option value="{{ $livro->id }}" class="form-control">{{ $livro->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Estoque</label>
                <input type="number" name="estoque" class="form-control">
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <br>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
        <hr>
        <h3>Meu estoque</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($estoque))
                    @foreach ($estoque as $livros)
                        <tr>
                            <th scope="row">{{ $livros->livro()->first()->nome }}</th>
                            <th scope="row">{{ $livros->estoque }}</th>
                            <th scope="row">
                                <form action="{{ route('delete.estoque') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="livro_id" value="{{ $livros->livro_id }}">
                                    <button type="submit" class="btn btn-danger"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg></button>
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
