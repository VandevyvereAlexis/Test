<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;   // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                             // Importe la classe Seeder
use App\Models\Role;                                        // Importe la classe Role

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role' => 'user'                                // Valeur pour la colonne 'role'
        ]);

        Role::create([
            'role' => 'admin'                               // Valeur pour la colonne 'role'
        ]);
    }
}
