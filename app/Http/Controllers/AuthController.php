<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //inscription
    public function register(Request $request)
    {
        //validation des données
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:15',
            'lastName'  => 'required|string|max:15',
            'email'     => 'required|string|email|unique:users',
            'password'  => 'required|string|min:6|max:8|confirmed', //contrainte 6-8 caractères
        ]);

        //gestion des erreurs de validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //craéation de l'utilisateur dans la bd
        $user = User::create([
            'firstName' => $request->firstName,
            'lastName'  => $request->lastName,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        //génération du token d'auth
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    //connexion
    public function login(Request $request)
    {
        //verification credentials
        $user = User::where('email', $request->email)->first();

        //gestion des erreurs de connexions
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'message' => 'user connecté avec succès'
        ]);
    }

    //déconnexion
    public function logout(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        //supression du token d'auth
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnexion réussie et token supprimé'
        ]);
    }
}
