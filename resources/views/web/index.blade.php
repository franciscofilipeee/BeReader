@include('layouts.index')

<body>
    @include('layouts.nav')
    <img src="{{ url('/images/banner.png') }}" width="100%">
    <hr>
    <div style="margin: 1rem">
        <h1>Quem somos?</h1>
        <p>Somos um site que revoluciona o mercado, melhorando o seu jeito de ler presencialmente! Contamos com
            diversas
            bibliotecas, resenhas críticas, notas, localização e empréstimos dos livros!</p>
    </div>
    @include('layouts.footer')
</body>

</html>
