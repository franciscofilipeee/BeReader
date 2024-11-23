<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Autores;
use App\Models\Avaliacoes;
use App\Models\Bibliotecas;
use App\Models\Emprestimos;
use App\Models\Livros;
use App\Models\LivrosEstoque;
use App\Models\TemasLivros;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        switch (Auth::user()->user_type_id) {
            case 1:
                $livros = Livros::all();
                $emprestimos = Emprestimos::where('user_id', Auth::user()->id)->get();
                $bibliotecas = Bibliotecas::all();
                $resenhas = Avaliacoes::where('user_id', Auth::user()->id)->get();
                return view('dashboard.usuario.index', ["livros" => $livros, "emprestimos" => $emprestimos, "bibliotecas" => $bibliotecas, "resenhas" => $resenhas]);
                break;
            case 2:
                $biblioteca_id = Bibliotecas::where('user_id', Auth::user()->id)->first()->user_id;
                $emprestimos = Emprestimos::where('biblioteca_id', $biblioteca_id)->get();
                $livros = Livros::get();
                return view('dashboard.bibliotecas.index', ["livros" => $livros, "emprestimos" => $emprestimos, "estoque" => LivrosEstoque::where('user_id', Auth::user()->id)->get()]);
                break;
            case 3:
                $temas = TemasLivros::get();
                $livros = Livros::with('autor', 'tema')->get();
                $usuarios = User::where('user_type_id', 1)->get()->count();
                $emprestimos = Emprestimos::get();
                $autores = Autores::get();
                return view('dashboard.admin.index', ["temas" => $temas, "livros" => $livros, "usarios" => $usuarios, "emprestimos" => $emprestimos, "autores" => $autores, "qtd_usuarios" => User::count(), "qtd_bibliotecas" => Bibliotecas::count(), "qtd_livros" => Livros::count(), "qtd_comentarios" => Avaliacoes::count(), "qtd_emprestimos" => Emprestimos::count()]);
                break;
            default:
                return view('auth.login');
        }
    }
}
