<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bibliotecas;
use App\Models\Emprestimos;
use App\Models\Livros;
use App\Models\LivrosEstoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimosController extends Controller
{
    public function index($biblioteca_id, $livro_id)
    {
        if (LivrosEstoque::where([["livro_id", $livro_id], ["user_id", $biblioteca_id]])->first() != null) {
            return view('web.emprestimo', ["livro" => Livros::where('id', $livro_id)->first(), "biblioteca" => Bibliotecas::where('user_id', $biblioteca_id)->first()]);
        } else {
            return redirect("/biblioteca/detalhes/$biblioteca_id");
        }
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $livros_estoque = LivrosEstoque::where([['livro_id', $request->livro_id], ['user_id', $request->biblioteca_id], ['estoque', '>', 0]])->first();

        if ($livros_estoque != null) {
            $emprestimo = Emprestimos::create([
                'livro_id' => $request->livro_id,
                'user_id' => $user_id,
                'biblioteca_id' => $request->biblioteca_id,
                'inicio' => now(),
                'final' => $request->final,
                'status' => 0
            ]);

            $livros_estoque->update([
                "estoque" => $livros_estoque->estoque - 1
            ]);
            return redirect("/bibliotecas");
        } else {
            return redirect("/biblioteca/detalhes/$request->biblioteca_id", ["errors" => "Não há estoque!"]);
        }
    }

    public function validar(Request $request)
    {
        $emprestimo = Emprestimos::where('id', $request->id)->first();
        $estoque = LivrosEstoque::where([["livro_id", $emprestimo->livro_id], ["user_id", $emprestimo->biblioteca_id]])->first();
        if ($request->status == 0) {
            $estoque->update([
                "estoque" => $estoque->estoque + 1
            ]);
            $emprestimo->delete();
        }
        Emprestimos::where('id', $request->id)->update([
            'status' => 1
        ]);

        return redirect('/dashboard');
    }
}
