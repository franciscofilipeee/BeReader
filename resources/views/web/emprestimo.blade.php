@include('layouts.index')

<body>
    @include('layouts.nav')
    <h2>Você deseja emprestar o livro {{ $livro->nome }} na biblioteca {{ $biblioteca->nome }}?</h2>
    <label>Antes, coloque a data de devolução abaixo</label>
    <form action="">
        @csrf
        <input type="text" name="final" class="form-control">
        <button type="submit" class="btn btn-success">Emprestar</button>
    </form>
    @include('layouts.footer')
</body>

</html>
