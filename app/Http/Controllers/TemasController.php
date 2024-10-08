<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TemasLivros;
use Illuminate\Http\Request;

class TemasController extends Controller
{
    public function store(Request $request)
    {
        TemasLivros::create([
            'nome' => $request->nome
        ]);

        return redirect('/dashboard');
    }
}
