@include('layouts.index')

<body>
    @include('layouts.nav')
    <h2>Você deseja emprestar o livro {{ $livro->nome }} na biblioteca {{ $biblioteca->nome }}?</h2>
    <label>Antes, coloque a data de devolução abaixo</label>
    <form action="/emprestimo/store" method="post">
        @csrf
        <input type="hidden" name="livro_id" value="{{ $livro->id }}">
        <input type="hidden" name="livro_id" value="{{ $biblioteca->id }}">
        <div class="col-md-3">
            <input type="date" name="final" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Emprestar</button>
    </form>
    <a href="/biblioteca/detalhes/{{ $biblioteca->id }}" class="btn btn-danger">Cancelar</a>
    @include('layouts.footer')
</body>

</html>
