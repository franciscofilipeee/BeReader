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
        <h3>Empréstimos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Livro</th>
                    <th scope="col">A pessoa retirou o livro?</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($emprestimos))
                    @foreach ($emprestimos as $emprestimo)
                        <tr>
                            <th scope="row">{{ $emprestimo->user()->first()->name }}</th>
                            <th scope="row">{{ $emprestimo->livro()->first()->nome }}</th>
                            <th scope="row">
                                <div style="display: flex; gap: 1rem">
                                    <form action="/validar/emprestimo" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="1">
                                        <input type="hidden" name="id" value="{{ $emprestimo->id }}">
                                        <button type="submit" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="/validar/emprestimo" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="0">
                                        <input type="hidden" name="id" value="{{ $emprestimo->id }}">
                                        <button type="submit" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
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
