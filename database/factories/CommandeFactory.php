<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;                         // Importe la classe Factory pour créer des instances de modèle
use App\Models\User;                                                        // Importe la classe User
use App\Models\Adresse;                                                     // Importe la classe Adresse

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => $this->faker->randomNumber(7, true),                // Valeur générée aléatoirement pour la colonne 'numero' en utilisant la méthode randomNumber() de l'objet faker pour obtenir un nombre entier aléatoire de 7 chiffres
            'prix' => $this->faker->randomFloat(2, 10, 5000),               // Valeur générée aléatoirement pour la colonne 'prix' en utilisant la méthode randomFloat() de l'objet faker pour obtenir un nombre aléatoire à virgule flottante entre 10 et 5000 avec deux décimales
            'user_id' => rand(1, User::count()),                            // Valeur générée aléatoirement pour la colonne 'user_id' en utilisant la fonction rand() et la méthode count() du modèle User
            'adresse_livraison_id' => rand(1, Adresse::count()),            // Valeur générée aléatoirement pour la colonne 'adresse_livraison_id' en utilisant la fonction rand() et la méthode count() du modèle Adresse
            'adresse_facturation_id' => rand(1, Adresse::count()),          // Valeur générée aléatoirement pour la colonne 'adresse_facturation_id' en utilisant la fonction rand() et la méthode count() du modèle Adresse
        ];
    }
}
