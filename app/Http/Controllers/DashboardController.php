<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Membre;
use App\Models\Message;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashbord_admin()
    {

        // dd(Equipe::get()->pr);

        $title = "DASHBOARD ADMINISTRATEUR";
        $users = User::get();
        $users_homme = User::where('genre', 'H')->get();
        $users_femme = User::where('genre', 'F')->get();
        $equipes = Equipe::get();
        $messages = Message::where('destinataire_id', Auth::user()->id)->get();
        $date = Carbon::today()->subDays();
        $users_inscrit = User::where('created_at','>=',$date)->get();
        $projets = Projet::get();

        return view('admin.dashboard', compact('title', 'messages', 'users','users_homme', 'users_femme','equipes', 'users_inscrit', 'projets'));
    }

    public function dashbord_chef()
    {
        $title = "DASHBOARD CHEF PROJET";
        $users = User::get();
        $equipes = Equipe::get();
        $projets = Projet::get();
        $messages = Message::where('destinataire_id', Auth::user()->id)->get();

        return view('chef-equipe.dashboard', compact('title', 'users','equipes', 'projets', 'messages'));
    }

    public function dashbord_user()
    {
        $title = "DASHBOARD EMPLOYE";
        Carbon::setLocale('fr');
        $equipes = Equipe::get();
        $taches = Tache::where('etat', 'debut')->get();
        $messages = Message::where('destinataire_id', Auth::user()->id)->get();
        $projets = Projet::get();
        $taches_debut = Tache::where('etat', 'debut')->get();
        $taches_encours = Tache::where('etat', 'encours')->get();
        $taches_termine = Tache::where('etat', 'termine')->get();

        return view('user.dashboard', compact('title', 'projets', 'taches','equipes', 'messages', 'taches_debut', 'taches_encours', 'taches_termine'));
    }
}
