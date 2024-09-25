@include('layouts.index')

<body>
    @include('layouts.nav')
    <h1>Lista de bibliotecas</h1>
    <div class="d-flex w-100">
        @foreach ($bibliotecas as $biblioteca)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $biblioteca->foto }}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $biblioteca->nome }}</h5>
                            <p class="card-text">{{ $biblioteca->endereco }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('layouts.footer')
</body>

</html>
