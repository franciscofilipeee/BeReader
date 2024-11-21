<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Emprestimos;
use App\Models\Livros;
use App\Models\LivrosEstoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimosController extends Controller
{
    public function index(Request $request, $id)
    {
        return view('web.emprestimo', ["livro" => Livros::where('id', $request->livro_id)->first()]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        if (LivrosEstoque::where([['livro_id', $request->livro_id], ['biblioteca_id', $request->biblioteca_id], ['estoque', '>', 0]])) {
            $emprestimo = Emprestimos::create([
                'livro_id' => $request->livro_id,
                'user_id' => $user_id,
                'biblioteca_id' => $request->biblioteca_id,
                'inicio' => now(),
                'final' => $request->final
            ]);
        } else {
            return redirect('/livro/' . $request->livro_id, ["errors" => "Não há estoque!"]);
        }
    }
}
