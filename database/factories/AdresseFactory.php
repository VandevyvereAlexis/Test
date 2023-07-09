<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;                                     // Importe la classe Factory pour créer des instances de modèle
use App\Models\User;                                                                    // Importe la classe User

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adresse' => $this->faker->secondaryAddress(),                              // Valeur générée aléatoirement pour la colonne 'adresse' en utilisant la méthode secondaryAddress() de l'objet faker
            'code_postal' => substr($this->faker->departmentNumber() . '000', 0, 5),    // Valeur générée aléatoirement pour la colonne 'code_postal' en utilisant la méthode departmentNumber() de l'objet faker et en ajoutant des zéros
            'ville' => $this->faker->city(),                                            // Valeur générée aléatoirement pour la colonne 'ville' en utilisant la méthode city() de l'objet faker
            'user_id' => rand(1, User::count()),                                        // Valeur générée aléatoirement pour la colonne 'user_id' en utilisant la fonction rand() et la méthode count() du modèle User
        ];
    }
}
