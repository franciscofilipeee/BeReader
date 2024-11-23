<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avaliacoes;
use App\Models\Bibliotecas;
use App\Models\Livros;
use App\Models\LivrosEstoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $livrosestoque = LivrosEstoque::where([['livro_id', $request->livro_id], ['user_id', Auth::user()->id]])->first();
        if ($livrosestoque != null) {
            $livrosestoque->update([
                'estoque' => $request->estoque
            ]);
        } else {
            LivrosEstoque::create([
                'estoque' => $request->estoque,
                'user_id' => $request->user_id,
                'livro_id' => $request->livro_id
            ]);
        }
        return redirect('/dashboard');
    }

    public function deleteEstoque(Request $request)
    {
        LivrosEstoque::where([['livro_id', $request->livro_id], ['user_id', Auth::user()->id]])->first()->delete();
        return redirect('/dashboard');
    }

    public function list($id)
    {
        return view('web.livro', ["livro" => Livros::find($id)->first(), "avaliacoes" => Avaliacoes::where('livro_id', $id)->get(), "nota_media" => Avaliacoes::where('livro_id', $id)->avg('nota'), "user" => Auth::user()]);
    }

    public function delete(Request $request)
    {
        Livros::find($request->id)->delete();
        return redirect('/dashboard');
    }
}
