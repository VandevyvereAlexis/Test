<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;                   // Importe le trait WithoutModelEvents pour désactiver les événements de modèle lors de l'exécution des seeders
use Illuminate\Database\Seeder;                                             // Importe la classe Seeder
use Illuminate\Support\Facades\DB;                                          // Importe la façade DB pour interagir avec la base de données
use App\Models\User;                                                        // Importe la classe User
use App\Models\Article;                                                     // Importe la classe Article

class FavoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <31; $i++){
            DB::table('favoris')->insert([
                'article_id' => rand(1 , Article::count()),                 // Valeur générée aléatoirement pour la colonne 'article_id' en utilisant la fonction rand() et la méthode count() du modèle Article
                'user_id' => $i,                                            // Valeur pour la colonne 'user_id' correspondant à la valeur de $i dans la boucle
                
            ]);
        }
    }
}
