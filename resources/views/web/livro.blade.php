@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h1>Detalhes do livro</h1>
        <h2>{{ $livro->nome }}</h2>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill"
                viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg>
            {{ $livro->nota_media }}
        </p>
        <br>
        <div class="d-flex">
            <img src="{{ url('/storage/' . $livro->capa) }}" style="max-width: 300px">
            <div style="margin: 1rem">
                <h3>Sinopse</h3>
                <p>{{ $livro->sinopse }}</p>
            </div>
        </div>
        <hr>
        <h2>Bibliotecas disponíveis</h2>

        <hr>
        @if ($comentarios != null)
            @foreach ($comentarios as $comentario)
                <div class="col-md-12 d-flex gap-3">
                    {{ $comentario->user->id }}
                    {{ $comentario->resenha }}
                </div>
            @endforeach
        @endif
    </div>
    @include('layouts.footer')

</body>
