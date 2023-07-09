<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;             // Importe la classe Factory pour créer des instances de modèle
use App\Models\User;                                            // Importe la classe User
use App\Models\Article;                                         // Importe la classe Article

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avis>
 */
class AvisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'commentaire' => $this->faker->paragraph(),         // Valeur générée aléatoirement pour la colonne 'commentaire' en utilisant la méthode paragraph() de l'objet faker
            'note' => $this->faker->numberBetween(1, 5),        // Valeur générée aléatoirement pour la colonne 'note' en utilisant la méthode numberBetween() de l'objet faker pour obtenir un nombre aléatoire entre 1 et 5
            'user_id' => rand(1, User::count()),                // Valeur générée aléatoirement pour la colonne 'user_id' en utilisant la fonction rand() et la méthode count() du modèle User
            'article_id' => rand(1, Article::count()),          // Valeur générée aléatoirement pour la colonne 'article_id' en utilisant la fonction rand() et la méthode count() du modèle Article
        ];
    }
}
