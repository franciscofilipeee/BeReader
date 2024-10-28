<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BibliotecaFotos;
use App\Models\Bibliotecas;
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
            'user_id' => $user->first()->id
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
<<<<<<< HEAD
        $biblioteca = Bibliotecas::findOrFail($id);
        $auth = Auth::user();
        if ($auth != null) {
            $url = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?destinations=" . "$biblioteca->cep" . "&origins=" . "$auth->cep" . "&units=metrical&key=AIzaSyAOX2FeN4aP2BL-Cm6R7I9KLNiag1eRrvc");
            $json = json_decode($url);
        }
        return view('perfil.bibliotecas.detalhes', ["biblioteca" => Bibliotecas::findOrFail($id)->with('fotos')->first(), "distancia" => $json->rows[0]->elements[0]->distance->text]);
=======
        return view('perfil.bibliotecas.detalhes', ["biblioteca" => Bibliotecas::findOrFail($id)->first(), "fotos" => BibliotecaFotos::where('biblioteca_id', $id)->get()]);
>>>>>>> 6c7c2db46cd57d95029437a79ce33b95ed519ada
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
