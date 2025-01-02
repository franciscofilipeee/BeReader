@include('layouts.index')

<body>
    @include('layouts.nav')
    <h1>Lista de bibliotecas</h1>
    <div class=" w-100 gap-1">
        @foreach ($bibliotecas as $biblioteca)
            <a href="{{ '/biblioteca/detalhes/' . $biblioteca->id }}" style="text-decoration: none">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $biblioteca->nome }}</h5>
                        <p class="card-text">{{ $biblioteca->cidade }}, {{ $biblioteca->estado }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @include('layouts.footer')
</body>

</html>
