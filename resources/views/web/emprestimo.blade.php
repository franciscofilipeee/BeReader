@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>Você deseja emprestar o livro {{ $livro->nome }} na biblioteca {{ $biblioteca->nome }}?</h2>
        <br>
        <label>Antes, coloque a data de devolução abaixo</label>
        <form action="/emprestimo/store" method="post">
            @csrf
            <input type="hidden" name="livro_id" value="{{ $livro->id }}">
            <input type="hidden" name="biblioteca_id" value="{{ $biblioteca->user_id }}">
            <div class="col-md-3">
                <input type="date" name="final" class="form-control">
            </div>
            <br>
            <div style="display: flex; gap: 1rem">
                <button type="submit" class="btn btn-success">Emprestar</button>
                <a href="/biblioteca/detalhes/{{ $biblioteca->id }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    @include('layouts.footer')
</body>

</html>
