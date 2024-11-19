@include('layouts.index')
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
                    <a class="nav-link" href="/bibliotecas">Bibliotecas</a>
                </li>
                <li class="nav-item">
                    @if (auth()->user() != null)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                @if (auth()->user()->user_type_id != 3)
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Meu perfil</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/login" class="btn btn-light">Entrar</a>
                            <a href="/register" class="btn btn-light">Cadastre-se</a>
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
