<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;                                                      // Importe le trait RegistersUsers qui fournit les fonctionnalités d'inscription d'utilisateurs
use Illuminate\Support\Facades\Hash;                                                                // Importe la façade Hash pour le hachage des mots de passe
use Illuminate\Support\Facades\Validator;                                                           // Importe la façade Validator pour la validation des données
use Illuminate\Validation\Rules\Password;                                                           // Importe la règle Password pour la validation des mots de passe

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Ce contrôleur gère l'inscription de nouveaux utilisateurs ainsi que leur
    | validation et création. Par défaut, ce contrôleur utilise un trait pour
    | fournir cette fonctionnalité sans nécessiter de code supplémentaire.
    |
    */

    use RegistersUsers;                                                                             // Utilise le trait RegistersUsers pour ajouter les fonctionnalités d'inscription

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;                                             // Définit la redirection des utilisateurs après leur inscription

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');                                                                 // Applique le middleware 'guest' qui permet uniquement aux utilisateurs non authentifiés d'accéder à ces routes
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom'           => ['required', 'string', 'max:50'],                                    // Valide que le champ 'nom' est requis, une chaîne de caractères et a une longueur maximale de 50
            'prenom'        => ['required', 'string', 'max:50'],                                    // Valide que le champ 'prenom' est requis, une chaîne de caractères et a une longueur maximale de 50
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],          // Valide que le champ 'email' est requis, une chaîne de caractères au format email, a une longueur maximale de 255 et est unique dans la table 'users'
            'password'      => [                                                                    // Valide que le champ 'password' est requis et respecte les règles suivantes :
                'required', 'confirmed',                                                            // Doit être confirmé (en présence d'un champ 'password_confirmation')
                Password::min(8)                                                                    // Doit avoir une longueur minimale de 8 caractères
                    ->mixedCase()                                                                   // Doit contenir au moins une minuscule et une majuscule
                    ->letters()                                                                     // Doit contenir au moins une lettre
                    ->numbers()                                                                     // Doit contenir au moins un chiffre
                    ->symbols()                                                                     // Doit contenir au moins un caractère spécial
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom'           => $data['nom'],                                                        // Crée une nouvelle instance utilisateur avec la valeur du champ 'nom'
            'prenom'        => $data['prenom'],                                                     // Assigne la valeur du champ 'prenom' à la colonne 'prenom' de la table 'users'
            'email'         => $data['email'],                                                      // Assigne la valeur du champ 'email' à la colonne 'email' de la table 'users'
            'password'      => Hash::make($data['password']),                                       // Hache le mot de passe et assigne la valeur hachée à la colonne 'password' de la table 'users'
        ]);
    }
}
