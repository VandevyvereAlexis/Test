<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes_articles', function (Blueprint $table) {
            $table->primary(['commande_id', 'article_id']);                         // Définit une clé primaire composée des colonnes 'commande_id' et 'article_id'
            $table->integer('quantite');                                            // Colonne "quantite" de type entier
            $table->integer('reduction');                                           // Colonne "reduction" de type entier
            $table->timestamps();                                                   // Colonnes "created_at" et "updated_at" de type timestamp

            $table->foreignId('commande_id')->constrained();                        // Colonne "commande_id" de type clé étrangère liée à la table "commandes"
            $table->foreignId('article_id')->constrained()->onDelete('cascade');    // Colonne "article_id" de type clé étrangère liée à la table "articles" avec suppression en cascade
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes_articles');                                 // Supprime la table "commandes_articles" si elle existe
    }
};