<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ---------------------------------------------------------
    // 1) AFFICHER TOUS LES CLIENTS
    // ---------------------------------------------------------
    public function index()
    {
        // On récupère uniquement les utilisateurs ayant le rôle client
        $clients = User::where('role', 'client')->orderBy('name')->get();

        return view('clients.index', compact('clients'));
    }
    public function show($id)
{
    $client = User::findOrFail($id);
    return view('clients.show', compact('client'));
}

    // ---------------------------------------------------------
    // 2) PAGE DE FORMULAIRE AJOUT
    // ---------------------------------------------------------
    public function create()
    {
        $clients = User::all();
        return view('clients.create');
    }

    // ---------------------------------------------------------
    // 3) ENREGISTRER UN NOUVEAU CLIENT
    // ---------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'prenom'  => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email',
            'password'=> 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'prenom'   => $request->prenom,
            'email'    => $request->email,
            'role'     => 'client',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('clients.index')
                         ->with('success', 'Client ajouté avec succès');
    }

    // ---------------------------------------------------------
    // 4) PAGE FORMULAIRE MODIFIER
    // ---------------------------------------------------------
    public function edit($id)
    {
        $client = User::findOrFail($id);

        return view('clients.edit', compact('client'));
    }

    // ---------------------------------------------------------
    // 5) METTRE À JOUR LE CLIENT
    // ---------------------------------------------------------
    public function update(Request $request, $id)
    {
        $client = User::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'prenom'  => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $client->id,
        ]);

        $client->update([
            'name'   => $request->name,
            'prenom' => $request->prenom,
            'email'  => $request->email,
        ]);

        return redirect()->route('clients.index')
                         ->with('success', 'Client mis à jour');
    }

    // ---------------------------------------------------------
    // 6) SUPPRIMER CLIENT
    // ---------------------------------------------------------
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('clients.index')
                         ->with('success', 'Client supprimé');
    }
}