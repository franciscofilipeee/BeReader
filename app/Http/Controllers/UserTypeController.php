<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserType;

class UserTypeController extends Controller
{
    public function create(Request $request)
    {
        $usertype = UserType::create([
            'nome' => $request->nome
        ]);

        return response()->json($usertype);
    }

    public function update(Request $request, $id)
    {
        UserType::where('id', $id)->update([
            'nome' => $request->nome
        ]);
    }

    public function delete($id)
    {
        return response()->json(UserType::findOrFail($id)->delete());
    }

    public function list()
    {
        return response()->json(UserType::get());
    }

    public function index()
    {
        return view();
    }
}
