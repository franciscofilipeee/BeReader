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
                @foreach ($emprestimos as $emprestimo)
                    <tr>
                        <th scope="row">{{ $emprestimo->id }}</th>
                        <td>{{ $emprestimo->livro_id }}</td>
                        <td>{{ $emprestimo->biblioteca_id }}</td>
                        <td>{{ $emprestimo->inicio }}</td>
                        <td>{{ $emprestimo->fim }}</td>
                    </tr>
                @endforeach
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
                </tr>
            </thead>
            <tbody>
                @foreach ($resenhas as $resenha)
                    <tr>
                        <th scope="row">{{ $emprestimo->id }}</th>
                        <td>{{ $emprestimo->livro_id }}</td>
                        <td>{{ $emprestimo->biblioteca_id }}</td>
                        <td>{{ $emprestimo->inicio }}</td>
                        <td>{{ $emprestimo->fim }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('layouts.footer')
</body>

</html>
