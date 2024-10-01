@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>Cadastrar livro</h2>
        <form action="{{ route('register.estoque') }}" method="post">
            @csrf
            <div>
                <label>Livro</label>
                <select name="livro_id" id="" class="form-control">
                    @foreach ($livros as $livro)
                        <option value="{{ $livro->id }}" class="form-control">{{ $livro->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Estoque</label>
                <input type="number" name="estoque" class="form-control">
            </div>
            <input type="hidden" name="biblioteca_id" value="{{ Auth::user()->id }}">
        </form>
    </div>
    @include('layouts.footer')
</body>

</html>
