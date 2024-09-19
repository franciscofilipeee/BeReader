@include('layouts.index')

<body>
    @include('layouts.nav')
    <div class="d-flex w-100">
        @foreach ($livros as $livro)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $livro->capa }}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $livro->nome }}</h5>
                            <p class="card-text">{{ $livro->sinopse }}</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('layouts.footer')
</body>

</html>
