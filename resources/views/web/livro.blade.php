@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        @if (isset($errors))
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
        <h2>Avaliações</h2>
        @if (isset($avaliacoes))
            @foreach ($avaliacoes as $avaliacao)
                <div class="col-md-12" style="display: flex">
                    <div class="col-md-1">
                        <img src="{{ $avaliacao->user()->foto }}" style="max-width: 64px">
                    </div>
                    <div class="col-md-11">
                        <p>{{ $avaliacao->resenha }}</p>
                    </div>
                </div>
            @endforeach
        @endif
        <hr>
        <h2>Bibliotecas disponíveis</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Biblioteca</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Localização</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($biliotecas))
                    @foreach ($bibliotecas as $biblioteca)
                        <tr>
                            <th scope="row">{{ $biblioteca->id }}</th>
                            <th scope="row">{{ $biblioteca->nome }}</th>
                            <th scope="row">{{ $biblioteca->localizacao }}</th>
                            <th scope="row">
                                <div style="gap: 1rem; display: flex;">
                                    <a href="/biblioteca/{{ $biblioteca->id }}" class="btn btn-gray">Visitar</a>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal">Emprestimo</button>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Empréstimo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/emprestimo" method="post">
                        @csrf
                        <input type="hidden" name="biblioteca_id" value="{{ $biblioteca->id }}">
                        <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                        <input type="date" name="final" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Emprestar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
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
