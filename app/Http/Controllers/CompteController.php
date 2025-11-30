<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\User;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    // Liste des comptes
    public function index()
    {
        $comptes = Compte::with('user')->get();
        return view('comptes.index', compact('comptes'));
    }

    // Form création
    public function create()
    {
        $clients = User::where('role', 'client')->get();
        return view('comptes.create', compact('clients'));
    }

    // Enregistrer compte
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'solde'   => 'required|numeric|min:0',
        ]);
   $rib = 'FR' . rand(1000000000, 9999999999);
        

        Compte::create([
            'rib'     => $rib,
            'solde'   => $request->solde,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('comptes.index')->with('success', 'Compte créé');
    }

    // Form modifier
    public function edit(Compte $compte)
    {
        $clients = User::where('role', 'client')->get();
        return view('comptes.edit', compact('compte', 'clients'));
    }

    // Mettre à jour
    public function update(Request $request, Compte $compte)
    {
        $request->validate([
    'rib'     => 'required|unique:comptes,rib,' . $compte->id,
    'solde'   => 'required|numeric',
    'user_id' => 'required|exists:users,id',
]);

$compte->update($request->only(['rib', 'solde', 'user_id']));


        return redirect()->route('comptes.index')->with('success', 'Compte modifié');
    }

    // Supprimer
    public function destroy(Compte $compte)
    {
        $compte->delete();
        return redirect()->route('comptes.index')->with('success', 'Compte supprimé');
    }
}