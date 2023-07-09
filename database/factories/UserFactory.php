<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;                                             // Importe la classe Factory pour créer des instances de modèle
use Illuminate\Support\Str;                                                                     // Importe la classe Str pour générer des chaînes aléatoires

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),                                                  // Valeur générée aléatoirement pour la colonne 'nom' en utilisant la méthode lastName() de l'objet faker
            'prenom' => $this->faker->firstName(),                                              // Valeur générée aléatoirement pour la colonne 'prenom' en utilisant la méthode firstName() de l'objet faker
            'email' => $this->faker->unique()->safeEmail(),                                     // Valeur générée aléatoirement pour la colonne 'email' en utilisant la méthode unique() et safeEmail() de l'objet faker
            'email_verified_at' => now(),                                                       // Valeur pour la colonne 'email_verified_at', définie sur l'instant actuel
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',       // Valeur en texte brut pour la colonne 'password', mot de passe fictif haché
            'remember_token' => Str::random(10),                                                // Valeur pour la colonne 'remember_token', une chaîne aléatoire de longueur 10 est générée en utilisant la méthode random() de la classe Str
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,                                                        // La colonne 'email_verified_at' est définie sur null pour indiquer que l'adresse e-mail n'est pas vérifiée
        ]);
    }
}