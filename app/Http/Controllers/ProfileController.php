<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\BibliotecaFotos;
use App\Models\Bibliotecas;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        switch (Auth::user()->user_type_id) {
            case 1:
                $user = Auth::user();
                return view('perfil.usuario.index', ['user' => $user]);
            case 2:
                $biblioteca = Bibliotecas::where('user_id', Auth::user()->id)->first();
                $fotos = BibliotecaFotos::where('biblioteca_id', $biblioteca->id)->get();
                return view('perfil.bibliotecas.index', [
                    'biblioteca' => $biblioteca,
                    'fotos' => $fotos
                ]);
                break;
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function uploadFoto(Request $request)
    {
        $user = Auth::user()->id;
        $foto = $request->foto->store('foto_perfil', 'public');
        User::where('id', $user)->update([
            "foto" => $foto
        ]);
        return redirect('/profile');
    }

    public function deleteFoto()
    {
        $user = Auth::user()->id;
        User::where('id', $user)->update([
            "foto" => "profile_pic.svg"
        ]);
        return redirect('/profile');
    }
}
