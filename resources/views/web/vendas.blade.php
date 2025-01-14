@include('layouts.index')

<body>
    @include('layouts.nav')
    <h1>Lista de livros usados</h1>
    @livewire('search-usados')
    @include('layouts.footer')
</body>

</html>
