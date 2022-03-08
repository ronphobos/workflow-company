<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\User;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function chef()
    {
        $title = "LES CHEFS D'EQUIPE";
        $equipes_chef = Equipe::get();
        return view('admin.personnel.chef-equipe', compact('title', 'equipes_chef'));
    }

    public function projet()
    {
        $title = "PROJETS";
        return view('chef-equipe.projet.index', compact('title'));
    }

    public function tache()
    {
        $title = "TACHES";
        return view('chef-equipe.projet.taches.index', compact('title'));
    }

    public function membre()
    {
        $title = "TACHES";
        $equipes_chef = Equipe::get();
        return view('chef-equipe.equipe.list', compact('title', 'equipes_chef'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "TACHES";
        $users = User::get();
        $equipes = Equipe::get();
        return view('admin.equipe.index', compact('title', 'users', 'equipes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $donnee = $this->validate($request, [
            'nom' => 'required|string',
            'chef' => 'required|string',
        ]);

        Equipe::create([
            'nom' => $request->nom,
            'chef' => $request->chef,
            'membre_id' => $request->membre_id,
        ]);

        return redirect()->back()->with('message', 'Equipe ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        //
        $donnee = $this->validate($request, [
            'nom' => 'required|string',
            'equipe_id' => 'required|string',
        ]);
        dd($donnee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        //
        $equipe->delete();
        return response()->json(['message' => 'Equipe archivée avec succès']);
    }
}