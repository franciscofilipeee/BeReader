<?php

namespace App\Http\Controllers;

use App\Models\Avaliacoes;
use App\Models\Curtidos;
use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliacoesController extends Controller
{
    public function write($id, Request $request)
    {
        return view('web.avaliar', ["livro" => Livros::find($id)->first()]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'resenha' => ['required', 'string', 'max:255'],
            'nota' => ['required', 'integer', 'max:5']
        ]);
        $user = Auth::user();
        $avaliacao = Avaliacoes::where([['livro_id', $id], ['user_id', $user->id]])->first();
        if ($avaliacao != null) {
            $avaliacao->update([
                'resenha' => $request->resenha,
                'nota' => $request->nota,
            ]);
        } else {
            Avaliacoes::create([
                'user_id' => $user->id,
                'livro_id' => $id,
                'resenha' => $request->resenha,
                'nota' => $request->nota
            ]);
        }

        return redirect('/livro/' . $id);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        Avaliacoes::find($id)->update([
            'resenha' => $request->resenha,
            'nota' => $request->nota
        ]);
    }

    public function delete($id, Request $request)
    {
        $user = Auth::user();
        $avaliacao = Avaliacoes::find($id)->first();
        if ($user->id == $avaliacao->user_id) {
            $avaliacao->delete();
        }
        return redirect('/livro/' . $request->livro_id);
    }

    public function deleteProfile($id, Request $request)
    {
        $user = Auth::user();
        $avaliacao = Avaliacoes::find($id)->first();
        if ($user->id == $avaliacao->user_id) {
            $avaliacao->delete();
        }
        return redirect('/dashboard');
    }

    public function curtir(Request $request)
    {
        $user = Auth::user();
        $curtidos = Curtidos::where([['livro_id', $request->avaliacao_id], ['user_id', $user->id]]);
        if ($curtidos->exists()) {
            $curtidos->delete();
        } else {
            Curtidos::create([
                'avaliacao_id' => $request->avaliacao_id,
                'user_id' => $user->id,
                'curtidos' => 1
            ]);
        }
    }

    public function descurtir(Request $request)
    {
        $user = Auth::user();
        $curtidos = Curtidos::where([['livro_id', $request->avaliacao_id], ['user_id', $user->id]]);
        if ($curtidos->exists()) {
            $curtidos->delete();
        } else {
            Curtidos::create([
                'avaliacao_id' => $request->avaliacao_id,
                'user_id' => $user->id,
                'curtidos' => 0
            ]);
        }
    }
}
