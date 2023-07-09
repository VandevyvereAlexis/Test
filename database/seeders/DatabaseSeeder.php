<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,                  // Appelle le seeder RoleSeeder pour remplir la table des rôles
            UserSeeder::class,                  // Appelle le seeder UserSeeder pour remplir la table des utilisateurs
            AdresseSeeder::class,               // Appelle le seeder AdresseSeeder pour remplir la table des adresses
            GammeSeeder::class,                 // Appelle le seeder GammeSeeder pour remplir la table des gammes
            ArticleSeeder::class,               // Appelle le seeder ArticleSeeder pour remplir la table des articles
            AvisSeeder::class,                  // Appelle le seeder AvisSeeder pour remplir la table des avis
            CommandeSeeder::class,              // Appelle le seeder CommandeSeeder pour remplir la table des commandes
            CampagneSeeder::class,              // Appelle le seeder CampagneSeeder pour remplir la table des campagnes
            FavoriSeeder::class,                // Appelle le seeder FavoriSeeder pour remplir la table des favoris
            CampagneArticleSeeder::class,       // Appelle le seeder CampagneArticleSeeder pour remplir la table de liaison entre campagnes et articles
            CommandeArticleSeeder::class        // Appelle le seeder CommandeArticleSeeder pour remplir la table de liaison entre commandes et articles
        ]);
    }
}
