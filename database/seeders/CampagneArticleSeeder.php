<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;       // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                                 // Importe la classe Seeder
use Illuminate\Support\Facades\DB;                              // Importe la façade DB pour interagir avec la base de données
use App\Models\Article;                                         // Importe la classe Article

class CampagneArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <31; $i++){
            DB::table('campagnes_articles')->insert([           // Insère des données dans la table 'campagnes_articles' à l'aide de la méthode insert() de la façade DB
                'article_id' => $i,                             // Valeur de la colonne 'article_id' correspondant à la valeur de $i dans la boucle
                'campagne_id' => rand(1, 4)                     // Valeur générée aléatoirement pour la colonne 'campagne_id' en utilisant la fonction rand() pour choisir un nombre entre 1 et 4
            ]);
        }
    }
}
