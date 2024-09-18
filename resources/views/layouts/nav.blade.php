<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
            <a href="/"><img src="{{ url('/images/logo_withoutbg.png') }}" width="40px"></a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Página inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/livros">Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bibliotecas</a>
                </li>
                <li class="nav-item">
                    @if (auth()->user() != null)
                        <a class="nav-link" href="#">Minha conta</a>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/login" class="btn btn-light">Entrar</a>
                            <a href="/register" class="btn btn-light">Cadastre-se</a>
                        </div>
                    @endif
                </li>
                <li>

                </li>
            </ul>
        </div>
    </div>
</nav>
