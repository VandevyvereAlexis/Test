<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adresse;

class AdresseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Adresse::factory(30)->create();         // Utilise la factory d'Adresse pour créer 30 enregistrements dans la table "adresses"
    }
}