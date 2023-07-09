<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;   // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                             // Importe la classe Seeder
use App\Models\Gamme;                                       // Importe la classe Gamme

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gamme::create([
            'nom' => 'machine espresso manuelle'            // Valeur pour la colonne 'nom'
        ]);

        Gamme::create([
            'nom' => 'machine espresso automatique'         // Valeur pour la colonne 'nom'
        ]);

        Gamme::create([
            'nom' => 'machine à piston'                     // Valeur pour la colonne 'nom'
        ]);

        Gamme::create([
            'nom' => 'cafetière filtre'                     // Valeur pour la colonne 'nom'
        ]);

        Gamme::create([ 
            'nom' => 'café à grains'                        // Valeur pour la colonne 'nom'
        ]);
    }
}
