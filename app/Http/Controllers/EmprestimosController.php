<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Emprestimos;
use Illuminate\Http\Request;

class EmprestimosController extends Controller
{
    public function index()
    {
        return view();
    }

    public function store(Request $request)
    {
        $emprestimo = Emprestimos::create([
            'livro_id' => $request->livro_id,
            'user_id' => $request->user_id,
            'biblioteca_id' => $request->biblioteca_id,
            'inicio' => now(),
            'final' => $request->final
        ]);

        return response()->json($emprestimo);
    }

    public function update(Request $request, $id)
    {
        Emprestimos::findOrFail($id)->update([
            'final' => $request->final
        ]);
    }

    public function createQrCode() {}

    public function joinQrCode() {}
}
