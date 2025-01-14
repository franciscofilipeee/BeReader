<div>
    <input name="search" type="text" placeholder="Pesquisa" class="form-control" style="max-width: 20rem" />

    <ul>
        @foreach ($usados as $usado)
            <li>{{ $usado->livro->nome }}</li>
        @endforeach
    </ul>
</div>
