<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Méthode pour connecter un utilisateur
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Connexion réussie']);
        }

        return response()->json(['message' => 'Adresse e-mail ou mot de passe incorrect'], 401);
    }

    // Méthode pour déconnecter un utilisateur
    public function logout(Request $request)
    {
        // Ajoutez ici la logique de déconnexion si nécessaire

        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
