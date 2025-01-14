<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsadosController extends Controller
{
    public function index()
    {
        return view('web.vendas');
    }

    public function create() {}

    public function delete() {}

    public function update() {}
}
