@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        @if ($errors != '[]')
            <div class="alert alert-danger" role="alert">
                <h2>{{ $errors }}</h2>
            </div>
        @endif
        <h1>Detalhes do livro</h1>
        <h2>{{ $livro->nome }}</h2>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill"
                viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg>
            {{ number_format($nota_media, 1, '.') }}
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
        <div style="display:flex; gap:1rem;">
            <h2>Avaliações</h2>
            <div>
                <a href="/livro/{{ $livro->id }}/avaliar" class="btn btn-success">Escrever</a>
            </div>
        </div>
        @if (isset($avaliacoes))
            @foreach ($avaliacoes as $avaliacao)
                <div class="col-md-12" style="display: flex">
                    <div class="col-md-1">
                        <img src="{{ url('/storage/' . $avaliacao->user()->first()->foto) }}" style="max-width: 32px">
                        <p>{{ $avaliacao->user()->first()->name }}</p>
                    </div>
                    <div class="col-md-10">
                        <p>{{ $avaliacao->resenha }}</p>
                    </div>
                    <div class="col-md-1">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>{{ number_format($avaliacao->nota, 1, '.') }}</p>
                        @if (isset($user))
                            @if ($user->id == $avaliacao->user()->first()->id)
                                <form action="/avaliacao/{{ $avaliacao->id }}/delete" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg></button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
                <hr>
            @endforeach
        @endif
    </div>
    @include('layouts.footer')
</body>
