<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;       // Utilise le trait WithoutModelEvents
use Illuminate\Database\Seeder;                                 // Utilise la classe Seeder
use App\Models\Avis;                                            // Utilise la classe Avis

class AvisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avis::factory(30)->create();                            // Crée 30 instances de la classe Avis et les insère dans la base de données
    }
}