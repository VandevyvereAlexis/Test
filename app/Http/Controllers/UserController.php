<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function updatePassword(Request $request, User $user)
    {

        // Validation des champs du formulaire
        $request->validate([

            'actuel_password' => 'required',
            'nouveau_password' => [

                'required', 
                'confirmed',
                Password::min(8)    // Longueur minimale de 8 caractères
                    ->mixedCase()   // Au moins une lettre minuscule et une lettre majuscule
                    ->letters()     // Au moins une lettre
                    ->numbers()     // Au moins un chiffre
                    ->symbols()     // Au moins un caractère spécial

                ]

        ]);

        // Récupération de l'utilisateur actuel
        $user = User::find(Auth::user()->id);               // L'utilisateur connecté
        $actuelPassword = $request->actuel_password;        // Mot de passe actuel saisi par l'utilisateur
        $actuelPasswordHashed = $user->password;            // Mot de passe actuel haché dans la base de données
        $nouveau_password = $request->nouveau_password;     // Nouveau mot de passe saisi par l'utilisateur

        // Vérification si le mot de passe actuel saisi correspond au mot de passe haché dans la base de données
        if (Hash::check($actuelPassword, $actuelPasswordHashed)) 
        {

            // Vérification si le mot de passe actuel et le nouveau mot de passe sont différents
            if ($actuelPassword !== $nouveau_password) 
            {

                // Mise à jour du mot de passe dans la base de données avec le nouveau mot de passe haché
                $user->password = Hash::make($nouveau_password);    
                $user->save();                                      
                return redirect()->back()->with('message', 'le mot de passe a bien été modifié');

            } else {
                return redirect()->back()->withErrors(['password_error', 'ancien et nouveau mot de passe identique']);
            }

        } else {
            return redirect()->back()->withErrors(['password_error', 'mot de passe actuel saisie incorrect']);
        } 

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Affiche une liste des ressources (utilisateurs)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Affiche le formulaire de création d'une nouvelle ressource (utilisateur)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Stocke la nouvelle ressource (utilisateur) dans la base de données
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Affiche les détails d'une ressource spécifique (utilisateur)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Renvoie la vue "user/edit" avec les données de l'utilisateur
        return view('user/edit', ['user' => $user]);                                        

        // Affiche le formulaire de modification de la ressource (utilisateur) spécifiée
        // La ressource utilisateur à modifier est passée en paramètre de la méthode
        // et est associée automatiquement grâce au typehinting de Laravel
        // Retourne une vue qui affiche le formulaire de modification
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        // Validation des données entrées par l'utilisateur
        $request->validate([
            'nom' => 'required|max:50',
            'prenom' => 'required|max:50',
            'email' => 'required|min:6|max:50',
        ]);

        // Mise à jour des propriétés de l'utilisateur avec les nouvelles valeurs
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');

        // Sauvegarde des modifications dans la base de données
        $user->save();

        // Redirection vers la page précédente avec un message de succès
        return back()->with('message', 'Vos informations ont bien été modifiées');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Vérifie si l'utilisateur connecté est l'utilisateur à supprimer
        if (Auth::user()->id == $user->id)
        {
            // Supprime l'utilisateur de la base de données
            $user->delete();

            // Redirige vers la page d'accueil avec un message de succès
            return redirect()->route('home')->with('message', 'Le compte a bien été supprimé');
        }
        else {
            // Redirige vers la page précédente avec une erreur
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }

}
