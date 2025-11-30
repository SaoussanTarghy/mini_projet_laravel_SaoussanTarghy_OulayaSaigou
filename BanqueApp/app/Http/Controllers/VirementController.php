<?php

namespace App\Http\Controllers;

use App\Models\Virement;
use App\Models\Compte;
use Illuminate\Http\Request;

class VirementController extends Controller
{
    // Liste
    public function index()
    {
        $virements = Virement::with(['compteEmetteur','compteRecepteur'])->get();
        return view('virements.index', compact('virements'));
    }

    // Formulaire
    public function create()
    {
        $comptes = Compte::all();
        return view('virements.create', compact('comptes'));
    }

    // Enregistrer virement
    public function store(Request $request)
    {
        $request->validate([
            'compte_emetteur_id'  => 'required|different:compte_recepteur_id',
            'compte_recepteur_id' => 'required',
            'montant'             => 'required|numeric|min:1',
        ]);

        $emetteur   = Compte::findOrFail($request->compte_emetteur_id);
        $recepteur  = Compte::findOrFail($request->compte_recepteur_id);

        // Vérification solde
        if ($emetteur->solde < $request->montant) {
            return back()->with('error', 'Solde insuffisant.');
        }

        // Mise à jour des soldes
        $emetteur->solde -= $request->montant;
        $recepteur->solde += $request->montant;

        $emetteur->save();
        $recepteur->save();

        // Enregistrer le virement
        Virement::create([
            'compte_emetteur_id'  => $emetteur->id,
            'compte_recepteur_id' => $recepteur->id,
            'montant'             => $request->montant,
        ]);

        return redirect()->route('virements.index')->with('success', 'Virement effectué');
    }
}