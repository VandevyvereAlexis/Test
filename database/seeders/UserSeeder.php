<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;           // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                                     // Importe la classe Seeder
use App\Models\User;                                                // Importe la classe User
use Illuminate\Support\Facades\Hash;                                // Importe la façade Hash pour gérer le hachage des mots de passe
use Illuminate\Support\Str;                                         // Importe la classe Str pour générer des chaînes aléatoires

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'Admin',                                       // Valeur pour la colonne 'nom'
            'prenom' => 'Admin',                                    // Valeur pour la colonne 'prenom'
            'password' => Hash::make('Admin2023!'),                 // Valeur pour la colonne 'password', le mot de passe est haché en utilisant la méthode make() de la façade Hash
            'email' => 'admin@admin.fr',                            // Valeur pour la colonne 'email'
            'email_verified_at' => now(),                           // Valeur pour la colonne 'email_verified_at', définie sur l'instant actuel
            'remember_token' => Str::random(10),                    // Valeur pour la colonne 'remember_token', une chaîne aléatoire de longueur 10 est générée en utilisant la méthode random() de la classe Str
            'role_id' => 2,                                         // Valeur pour la colonne 'role_id'
        ]);

        User::create([
            'nom' => 'User',                                        // Valeur pour la colonne 'nom'
            'prenom' => 'User',                                     // Valeur pour la colonne 'prenom'
            'password' => Hash::make('User2023!'),                  // Valeur pour la colonne 'password', le mot de passe est haché en utilisant la méthode make() de la façade Hash
            'email' => 'user@user.fr',                              // Valeur pour la colonne 'email'
            'email_verified_at' => now(),                           // Valeur pour la colonne 'email_verified_at', définie sur l'instant actuel
            'remember_token' => Str::random(10),                    // Valeur pour la colonne 'remember_token', une chaîne aléatoire de longueur 10 est générée en utilisant la méthode random() de la classe Str
            'role_id' => 1,                                         // Valeur pour la colonne 'role_id'
        ]);

        User::factory(28)->create();                                // Crée 28 instances de la classe User à l'aide de la méthode factory() et les insère dans la base de données
    }
}