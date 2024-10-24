@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        @if ($fotos != null)
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
        <h1>Detalhes da biblioteca</h1>
        <h2>{{ $biblioteca->nome }}</h2>
    </div>
    @include('layouts.footer')

</body>
