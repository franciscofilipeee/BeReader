<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bibliotecas;
use Illuminate\Http\Request;

class BibliotecasController extends Controller
{
    public function index()
    {
        return view();
    }

    public function store(Request $request)
    {
        $biblioteca = Bibliotecas::create([
            'nome' => $request->nome,
            'logradouro' => $request->logradouro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'escola' => $request->escola
        ]);

        return response()->json($biblioteca);
    }

    public function update(Request $request, $id)
    {
        $biblioteca = Bibliotecas::findOrFail($id)->update([
            'nome' => $request->nome,
            'logradouro' => $request->logradouro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'escola' => $request->escola
        ]);
    }

    public function listAll()
    {
        $Bibliotecas = Bibliotecas::get();
    }

    public function list($id)
    {
        Bibliotecas::findOrFail($id)->first();
    }

    public function destroy($id)
    {
        Bibliotecas::findOrFail($id)->delete();
    }
}
