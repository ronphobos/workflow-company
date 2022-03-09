<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $title = "CONNEXION";
        return view('auth.login', compact('title'));
    }

    public function profil()
    {
        $user = Auth::user();
        $title = "PROFIL : $user->nom_utilisateur";
        return view('auth.profile', compact('user', 'title'));
    }

    public function update_profil(User $user, Request $request)
    {
        dd('ok');
    }


    public function doregister(Request $request)
    {
        $this->validate($request, [
            'nom_prenom' => 'required|string',
            'nom_utilisateur' => 'required|string',
            'genre' => 'required|string',
            'email' => 'required|email|unique:users',
            'mdp' => 'required|confirmed',
        ]);

        User::create([
            'nom_prenom' => $request->nom_prenom,
            'nom_utilisateur' => $request->nom_utilisateur,
            'genre' => $request->genre,
            'email' => $request->email,
            'mdp' => Hash::make($request->mdp),
        ]);

        if (Auth::attempt(['email' => $request->email, 'mdp' => $request->mdp])) {
            return redirect()->route('user.dashbord')->with('message', 'Connexion réussie.');
        } else {
            dd('non');
        }


    }

    public function logout()
    {
        if(Auth::user()){
            Auth::logout();
            return redirect()->route('user.login');
        }else {
            return redirect()->route('user.login');
        }
    }

    public function lock()
    {
        // METTRE LA PAGE DE VERROUILLAGE ICI
        $title = "PAGE BLOQUEE";
        return view('auth.lock', compact('title'));
    }

    public function unlock(Request $request)
    {
        // METTRE LE CODE DE DEVERROUILLAGE ICI
        $this->validate($request, [
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => Auth::user()->email, 'password' => $request['password']))) {

            if (auth()->user()->type_utilisateur == 'admin') {
                return redirect()->route('admin.dashbord')->with('message', 'Bienvenue réussie.');
            }
            if (auth()->user()->type_utilisateur == 'chef') {
                return redirect()->route('chef.dashbord')->with('message', 'Bienvenue réussie.');
            }
            else {
                return redirect()->route('user.dashbord')->with('message', 'Bienvenue réussie.');
            }
        }else{
            return redirect()->back()->with('message', 'Mot de passe incorrecte.');
        }
    }

    public function parametre()
    {
        # code...
    }

    public function storeParametre(Request $request)
    {
        # code...
    }
}
