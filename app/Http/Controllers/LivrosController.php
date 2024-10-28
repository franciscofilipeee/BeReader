<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livros;
use App\Models\LivrosEstoque;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function index()
    {
        $livros = Livros::get();
        return view('web.livros', ["livros" => $livros]);
    }

    public function store(Request $request)
    {
        $capa = $request->capa->store('livros_capas', 'public');

        $livros = Livros::create([
            "nome" => $request->nome,
            "autor" => $request->autor,
            "data_lancamento" => $request->data_lancamento,
            "edicao" => $request->edicao,
            "capa" => $capa,
            "sinopse" => $request->sinopse,
            "tema_id" => $request->tema_id
        ]);

        dd($livros);
    }

    public function storeEstoque(Request $request)
    {
        LivrosEstoque::create([
            'estoque' => $request->estoque,
            'biblioteca_id' => $request->biblioteca_id,
            'livro_id' => $request->livro_id
        ]);

        return route('/dashboard');
    }
}
