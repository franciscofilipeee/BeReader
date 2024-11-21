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
                    <div>
                        <img src="{{ url('/storage/' . $avaliacao->user()->first()->foto) }}" style="max-width: 32px">
                        <p>{{ $avaliacao->user()->first()->name }}</p>
                    </div>
                    <div class="col-md-11">
                        <p>{{ $avaliacao->resenha }}</p>
                    </div>
                    <div style="display: flex; gap: 1rem">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>{{ number_format($avaliacao->nota, 1, '.') }}</p>
                        @if (auth()->user()->id == $avaliacao->user()->first()->id)
                            <form action="/avaliacao/{{ $avaliacao->id }}/delete" method="post">
                                @csrf
                                <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                                <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-trash"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></button>
                            </form>
                        @endif
                    </div>

                </div>
                <hr>
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
                @if ($bibliotecas != null)
                    @foreach ($bibliotecas as $biblioteca)
                        <tr>
                            <th scope="row">{{ $biblioteca->id }}</th>
                            <th scope="row">{{ $biblioteca->nome }}</th>
                            <th scope="row">{{ $biblioteca->logradouro }}, {{ $biblioteca->bairro }},
                                {{ $biblioteca->cidade }}, {{ $biblioteca->estado }}</th>
                            <th scope="row">
                                <div style="gap: 1rem; display: flex;">
                                    <a href="/biblioteca/detalhes/{{ $biblioteca->id }}"
                                        class="btn btn-gray">Visitar</a>
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
                    @if (isset($biliotecas))
                        <form action="/emprestimo" method="post">
                            @csrf
                            <input type="hidden" name="biblioteca_id" value="{{ $biblioteca->id }}">
                            <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                            <input type="date" name="final" class="form-control">
                        </form>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Emprestar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
