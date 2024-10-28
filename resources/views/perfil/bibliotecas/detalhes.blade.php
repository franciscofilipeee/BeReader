@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
<<<<<<< HEAD
=======
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
>>>>>>> 6c7c2db46cd57d95029437a79ce33b95ed519ada
        <h1>Detalhes da biblioteca</h1>
        <h2>{{ $biblioteca->nome }}</h2>
        <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg> {{ $biblioteca->logradouro }}, {{ $biblioteca->bairro }}, {{ $biblioteca->cidade }},
            {{ $biblioteca->estado }}. A <b>{{ $distancia }}</b> de você!</p>
        @if ($biblioteca->fotos() == null)
            <br>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
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
        <table>

        </table>
    </div>
    @include('layouts.footer')

</body>
