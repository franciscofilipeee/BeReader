@include('layouts.index')

<body>
    @include('layouts.nav')
    <div style="margin: 1rem">
        <h2>Cadastrar tema</h2>
        <form action="{{ route('') }}" method="post">
            @csrf
            <div class="col-md-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
        </form>
        <br>
        <hr>
        <h2>Cadastrar livro</h2>
        <form action="{{ route('register.livro') }}" method="post">
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
        <br>
        <hr>
        <h2>Cadastrar autor</h2>
        <form action="{{ route('register.livro') }}" method="post">
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
        <br>
        <hr>
        <h2>Cadastrar livro</h2>
        <form action="{{ route('register.livro') }}" method="post">
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
