<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livros;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function index()
    {
        $livros = Livros::get();
        return view('web.livros', $livros);
    }

    public function store(Request $request)
    {
        $livros = Livros::create([
            "nome" => $request->nome,
            "autor" => $request->autor,
            "data_lancamento" => $request->data_lancamento,
            "edicao" => $request->edicao,
            "capa" => $request->capa,
            "sinopse" => $request->sinopse,
            "tema_id" => $request->tema_id
        ]);

        dd($livros);
    }
}
