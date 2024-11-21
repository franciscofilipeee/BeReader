@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>{{ $biblioteca->nome }}</h2>
        <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg> {{ $biblioteca->logradouro }}, {{ $biblioteca->bairro }}, {{ $biblioteca->cidade }},
            {{ $biblioteca->estado }}. @if (isset($distancia))
                Aproximadamente <b>{{ $distancia }}</b> de você!
            @endif
        </p>
        @if (isset($fotos))
        @else
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $fotos->first()->foto }}" class="d-block w-100" alt="...">
                    </div>
                    @foreach ($biblioteca->fotos() as $foto)
                        <div class="carousel-item">
                            <img src="{{ $foto->foto }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
        <table class="table" style="min-height: 20rem">
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
                            <td><img src="{{ $livro_estoque->capa }}" style="max-width: 200px"></td>
                            <th scope="row">{{ $livro_estoque->nome }}</th>
                            <th scope="row">{{ $livro_estoque->autor }}</th>
                            <th scope="row">{{ $livro_estoque->tema }}</th>
                            <th scope="row">{{ $livro_estoque->estoque }}</th>
                            <th scope="row">
                                <form action="/emprestimo" method="get">
                                    <input type="hidden" name="livro_id" value={{ $livro_estoque->id }}>
                                    @if ($livro_estoque->estoque >= 1)
                                        <button type="submit" class="btn btn-success">Emprestar</button>
                                    @else
                                        <button disabled="disabled" class="btn btn-gray">Emprestar</button>
                                    @endif
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
