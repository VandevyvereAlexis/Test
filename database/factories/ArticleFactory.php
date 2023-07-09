<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;                         // Importe la classe Factory pour créer des instances de modèle
use App\Models\Gamme; // Importe la classe Gamme

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->words(1, true),                          // Valeur générée aléatoirement pour la colonne 'nom' en utilisant la méthode words() de l'objet faker
            'description' => $this->faker->words(10, true),                 // Valeur générée aléatoirement pour la colonne 'description' en utilisant la méthode words() de l'objet faker
            'description_detaillee' => $this->faker->words(50, true),       // Valeur générée aléatoirement pour la colonne 'description_detaillee' en utilisant la méthode words() de l'objet faker
            'image' => 'default_picture_' . rand(1, 5) . '.jpeg',           // Valeur générée aléatoirement pour la colonne 'image' en utilisant la fonction rand() pour obtenir un nombre aléatoire entre 1 et 5
            'prix' => $this->faker->randomFloat(2, 10, 1000),               // Valeur générée aléatoirement pour la colonne 'prix' en utilisant la méthode randomFloat() de l'objet faker pour obtenir un nombre aléatoire à virgule flottante entre 10 et 1000 avec deux décimales
            'stock' => $this->faker->randomNumber(3, true),                 // Valeur générée aléatoirement pour la colonne 'stock' en utilisant la méthode randomNumber() de l'objet faker pour obtenir un nombre entier aléatoire de trois chiffres
            'note' => rand(3, 5),                                           // Valeur générée aléatoirement pour la colonne 'note' en utilisant la fonction rand() pour obtenir un nombre aléatoire entre 3 et 5
            'gamme_id' => rand(1, Gamme::count()),                          // Valeur générée aléatoirement pour la colonne 'gamme_id' en utilisant la fonction rand() et la méthode count() du modèle Gamme
        ];
    }
}
