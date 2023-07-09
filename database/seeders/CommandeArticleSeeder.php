<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;           // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                                     // Importe la classe Seeder
use App\Models\Article;                                             // Importe la classe Article
use Illuminate\Support\Facades\DB;                                  // Importe la façade DB pour interagir avec la base de données
use App\Models\Commande;                                            // Importe la classe Commande

class CommandeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <61; $i++){
            DB::table('commandes_articles')->insert([
                'article_id' => rand(1 , Article::count()),         // Valeur générée aléatoirement pour la colonne 'article_id' en utilisant la fonction rand() et la méthode count() du modèle Article
                'commande_id' => $i,                                // Valeur de la colonne 'commande_id' correspondant à la valeur de $i dans la boucle
                'quantite' => rand(1, 10),                          // Valeur générée aléatoirement pour la colonne 'quantite' en utilisant la fonction rand() pour choisir un nombre entre 1 et 10
                'reduction' => rand(10, 20)                         // Valeur générée aléatoirement pour la colonne 'reduction' en utilisant la fonction rand() pour choisir un nombre entre 10 et 20
            ]);
        }
    }
}
