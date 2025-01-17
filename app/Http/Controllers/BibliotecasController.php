<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BibliotecaFotos;
use App\Models\Bibliotecas;
use App\Models\LivrosEstoque;
use App\Models\User;
use App\Notifications\UserWelcome;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BibliotecasController extends Controller
{
    public function index()
    {
        return view('web.bibliotecas', ["bibliotecas" => Bibliotecas::get()]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type_id' => 2
        ]);
        $biblioteca = Bibliotecas::create([
            'nome' => $request->biblioteca_name,
            'logradouro' => $request->biblioteca_logradouro,
            'cidade' => $request->biblioteca_cidade,
            'bairro' => $request->biblioteca_bairro,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'escola' => $request->escola,
            'user_id' => $user->id
        ]);

        event(new Registered($user));

        $user->notify(new UserWelcome());

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
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
        $biblioteca = Bibliotecas::findOrFail($id);
        $auth = Auth::user();
        if (isset($auth)) {
            $url = Http::get("https://api.brasilaberto.com/v1/distance?pointA=$auth->cep&pointB=$biblioteca->cep&mode=STRAIGHT_LINE");
            $json = json_decode($url);
        }
        if (isset($json->rows[0]->elements[0]->distance->text))
            $distancia = $json->rows[0]->elements[0]->distance->text;
        else
            $distancia = null;
        return view('perfil.bibliotecas.detalhesdistancia', ["biblioteca" => $biblioteca, "fotos" => BibliotecaFotos::where('biblioteca_id', $id)->get(), "distancia" => $distancia, "livros_estoque" => LivrosEstoque::where('user_id', $biblioteca->user_id)->get()]);
    }

    public function destroy($id)
    {
        Bibliotecas::findOrFail($id)->delete();
    }

    public function storeFoto(Request $request)
    {
        $biblioteca = Bibliotecas::where('user_id', $request->user_id)->first()->id;
        $foto = $request->foto->store('fotos_biblioteca', 'public');
        BibliotecaFotos::create([
            'foto' => $foto,
            'biblioteca_id' => $biblioteca
        ]);

        return redirect('/profile');
    }

    public function destroyFoto(Request $request)
    {
        $foto = BibliotecaFotos::where('id', $request->id)->first();
        $json = json_decode($foto);
        $foto->delete();
        FacadesFile::delete($json->foto);
        return redirect('/profile');
    }

    public function listByDistance() {}
}
