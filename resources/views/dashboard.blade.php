@include('layouts.index')

<body>
    @include('layouts.nav')
    @switch(Auth::user()->user_type_id)
        @case(1)
            <div>
                <h2>Meus empréstimos</h2>
                <br>
                {{-- @foreach ($emprestimos as $emprestimo)
                    <div>

                    </div>
                @endforeach --}}
            </div>
        @break

        @case(2)
        @break

        @case(3)
        @break
    @endswitch
</body>
