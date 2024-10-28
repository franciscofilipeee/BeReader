<?php

namespace App\Http\Controllers;

use App\Models\Autores;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    public function store(Request $request)
    {
        Autores::create([
            "nome" => $request->nome,
            "nacionalidade" => $request->nacionalidade
        ]);
        return redirect('/dashboard');
    }
}
