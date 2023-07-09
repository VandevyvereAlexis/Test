<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;       // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                                 // Importe la classe Seeder
use App\Models\Campagne;                                        // Importe la classe Campagne

class CampagneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campagne::create([
            'nom' => 'Soldes de printemps 2023',                // Valeur pour la colonne 'nom'
            'date_debut' => '2023-04-01',                       // Valeur pour la colonne 'date_debut'
            'date_fin' => '2023-04-30',                         // Valeur pour la colonne 'date_fin'
            'reduction' => 15,                                  // Valeur pour la colonne 'reduction'
        ]);

        Campagne::create([
            'nom' => 'Super soldes d\'été 2023',                // Valeur pour la colonne 'nom'
            'date_debut' => '2023-07-01',                       // Valeur pour la colonne 'date_debut'
            'date_fin' => '2023-07-31',                         // Valeur pour la colonne 'date_fin'
            'reduction' => 30,                                  // Valeur pour la colonne 'reduction'
        ]);

        Campagne::create([
            'nom' => 'Black Friday 2023',                       // Valeur pour la colonne 'nom'
            'date_debut' => '2023-11-15',                       // Valeur pour la colonne 'date_debut'
            'date_fin' => '2023-11-30',                         // Valeur pour la colonne 'date_fin'
            'reduction' => 60,                                  // Valeur pour la colonne 'reduction'
        ]);

        Campagne::create([
            'nom' => 'Soldes d\'hiver 2023-2024',               // Valeur pour la colonne 'nom'
            'date_debut' => '2023-12-26',                       // Valeur pour la colonne 'date_debut'
            'date_fin' => '2024-01-15',                         // Valeur pour la colonne 'date_fin'
            'reduction' => 15,                                  // Valeur pour la colonne 'reduction'
        ]);
    }
}
