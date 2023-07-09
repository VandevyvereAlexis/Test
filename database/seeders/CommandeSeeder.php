<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;       // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                                 // Importe la classe Seeder
use App\Models\Commande;                                        // Importe la classe Commande

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commande::factory(60)->create();                        // Crée 60 instances de la classe Commande à l'aide de la méthode factory() et les insère dans la base de données avec la méthode create()
    }
}
