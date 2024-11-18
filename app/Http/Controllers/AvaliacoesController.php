<?php

namespace App\Http\Controllers;

use App\Models\Avaliacoes;
use App\Models\Curtidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliacoesController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $avaliacao = Avaliacoes::where([['livro_id', $request->livro_id], ['user_id', $user->id]])->first();
        if ($avaliacao->exists()) {
            $avaliacao->update([
                'resenha' => $request->resenha,
                'nota' => $request->nota
            ]);
        } else {
            Avaliacoes::create([
                'user_id' => $user->id,
                'livro_id' => $request->livro_id,
                'resenha' => $request->resenha,
                'nota' => $request->nota
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        Avaliacoes::find($id)->update([
            'resenha' => $request->resenha,
            'nota' => $request->nota
        ]);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $avaliacao = Avaliacoes::find($id)->first();
        if ($user->id == $avaliacao->user_id) {
            $avaliacao->delete();
        }
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
