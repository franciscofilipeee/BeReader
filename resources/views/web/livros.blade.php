@include('layouts.index')

<body>
    @include('layouts.nav')
    <div class="d-flex w-100">
        @foreach ($livros as $livro)
            @include('layouts.card_livros')
        @endforeach
    </div>
    @include('layouts.footer')
</body>

</html>
