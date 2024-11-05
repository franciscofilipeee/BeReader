@include('layouts.index')

<body>
    @include('layouts.nav')
    <h1>Lista de livros</h1>
    <div class="w-100 gap-2">
        @foreach ($livros as $livro)
            <a href="{{ '/livro/' . $livro->id }}">
                <div class="card mb-3">
                    <div class="row-g-0 d-flex">
                        <div class="col-md-4">
                            <img src="{{ url('/storage/' . $livro->capa) }}" class="img-fluid rounded"
                                style="max-width: 150px; margin: 1rem">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $livro->nome }}</h5>
                                <p class="card-text">{{ $livro->autor_id }}</p>
                                <p class="card-text"><small class="text-body-secondary"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        {{ $livro->nota_media }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @include('layouts.footer')
</body>

</html>
