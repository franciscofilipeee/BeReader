@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h1>Detalhes da biblioteca</h1>
        <h2>{{ $biblioteca->nome }}</h2>
        <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg> {{ $biblioteca->logradouro }}, {{ $biblioteca->bairro }}, {{ $biblioteca->cidade }},
            {{ $biblioteca->estado }}.
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Capa</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($livros_estoque))
                    @foreach ($livros_estoque as $livro_estoque)
                        <tr>
                            <td><img src="{{ url('/storage/' . $livro_estoque->livro()->first()->capa) }}"
                                    style="max-width: 128px">
                            </td>
                            <th scope="row">{{ $livro_estoque->livro()->first()->nome }}</th>
                            <th scope="row">{{ $livro_estoque->livro()->first()->autor()->first()->nome }}</th>
                            <th scope="row">{{ $livro_estoque->livro()->first()->tema()->first()->nome }}</th>
                            <th scope="row">{{ $livro_estoque->estoque }}</th>
                            <th scope="row">
                                @if ($livro_estoque->estoque >= 1)
                                    <a href="/emprestimo/{{ $biblioteca->user_id }}/{{ $livro_estoque->livro_id }}"
                                        class="btn btn-success">Emprestar</button>
                                    @else
                                        <button disabled="disabled" class="btn btn-gray">Emprestar</button>
                                @endif
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @include('layouts.footer')

</body>
