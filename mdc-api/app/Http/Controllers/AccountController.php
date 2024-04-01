<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    // Afficher tous les comptes utilisateur
    public function index()
    {
        $accounts = User::all();
        return response()->json($accounts);
    }

    // Afficher les détails d'un compte utilisateur spécifique
    public function show($id)
    {
        $account = User::findOrFail($id);
        return response()->json($account);
    }

    // Créer un nouveau compte utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $account = new User();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = bcrypt($request->password);
        $account->save();

        return response()->json(['message' => 'Compte utilisateur créé avec succès', 'data' => $account], 201);
    }

    // Mettre à jour les informations d'un compte utilisateur existant
    public function update(Request $request, $id)
    {
        $account = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $account->name = $request->name;
        $account->email = $request->email;
        if ($request->has('password')) {
            $account->password = bcrypt($request->password);
        }
        $account->save();

        return response()->json(['message' => 'Compte utilisateur mis à jour avec succès', 'data' => $account]);
    }

    // Supprimer un compte utilisateur
    public function destroy($id)
    {
        $account = User::findOrFail($id);
        $account->delete();

        return response()->json(['message' => 'Compte utilisateur supprimé avec succès']);
    }
}
