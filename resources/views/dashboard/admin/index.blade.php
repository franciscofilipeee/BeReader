@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>Cadastrar tema</h2>
        <form action="{{ route('register.temas') }}" method="post">
            @csrf
            <div class="col-md-12">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        <br>
        <hr>
        <h2>Cadastrar livro</h2>
        <form action="{{ route('register.livros') }}" method="post">
            @csrf
            <div class="col-md-12 d-flex gap-1">
                <div class="col-md-6">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Autor</label>
                    <select name="autor" class="form-control">
                        @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}" class="form-control">{{ $autor->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Tema</label>
                    <select name="tema_id" class="form-control">
                        @foreach ($temas as $tema)
                            <option value="{{ $tema->id }}" class="form-control">{{ $tema->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <h2>Cadastrar autor</h2>
        <form action="{{ route('register.livros') }}" method="post">
            @csrf
            <div class="col-md-12 d-flex gap-1">
                <div class="col-md-6">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Nacionalidade</label>
                    <select name="nacionalidade" id="" class="form-control">
                        @include('layouts.optionnacionalidade')
                    </select>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <h2>Cadastrar livro</h2>
        <form action="{{ route('register.livros') }}" method="post">
            @csrf
            <div class="col-md-6">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Autor</label>
                <select name="autor" class="form-control">
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label>Tema</label>
                <select name="tema_id" class="form-control">
                    @foreach ($temas as $tema)
                        <option value="{{ $tema->id }}" class="form-control">{{ $tema->nome }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
    @include('layouts.footer')
</body>

</html>
