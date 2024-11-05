<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avaliacoes;
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

        Livros::create([
            "nome" => $request->nome,
            "autor_id" => $request->autor,
            "capa" => $capa,
            "sinopse" => $request->sinopse,
            "tema_id" => $request->tema_id
        ]);

        return redirect('/dashboard');
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

    public function list($id)
    {
        return view('web.livro', ["livro" => Livros::find($id)->first(), "comentarios" => Avaliacoes::where('livro_id', $id)]);
    }
}
