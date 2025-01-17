@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>Meus Empréstimos</h2>
        <table class="table" style="min-height: 20rem">
            <thead>
                <tr>
                    <th scope="col">Empréstimo</th>
                    <th scope="col">Livro</th>
                    <th scope="col">Biblioteca</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Fim</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($emprestimos))
                    @foreach ($emprestimos as $emprestimo)
                        <tr>
                            <th scope="row">{{ $emprestimo->id }}</th>
                            <td>{{ $emprestimo->livro()->first()->nome }}</td>
                            <td>{{ $emprestimo->biblioteca()->first()->nome }}</td>
                            <td>{{ $emprestimo->inicio }}</td>
                            <td>{{ $emprestimo->final }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <hr>
        <h2>Minhas resenhas</h2>
        <table class="table" style="min-height: 20rem">
            <thead>
                <tr>
                    <th scope="col">Livro</th>
                    <th scope="col">Resenha</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resenhas as $resenha)
                    <tr>
                        <th scope="row">{{ $resenha->livro()->first()->nome }}</th>
                        <td>{{ $resenha->resenha }}</td>
                        <td>{{ $resenha->nota }}</td>
                        <td>
                            <form action="/profile/avaliacao/{{ $resenha->id }}/delete" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-trash"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('layouts.footer')
</body>

</html>
