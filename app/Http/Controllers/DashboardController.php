<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avaliacoes;
use App\Models\Bibliotecas;
use App\Models\Emprestimos;
use App\Models\Livros;
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
                $biblioteca_id = Bibliotecas::where('user_id', Auth::user()->id)->first()->id;
                $emprestimos = Emprestimos::where('biblioteca_id', $biblioteca_id)->get();
                $livros = Livros::get();
                return view('dashboard.bibliotecas.index', ["livros" => $livros, "emprestimos" => $emprestimos]);
                break;
            case 3:
                $temas = TemasLivros::get();
                return view('dashboard.admin.index', ["temas" => $temas]);
                break;
            default:
                return view('auth.login');
        }
    }
}
