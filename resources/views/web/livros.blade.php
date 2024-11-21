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
