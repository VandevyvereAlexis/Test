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
        Schema::create('campagnes_articles', function (Blueprint $table) {
            $table->primary(['campagne_id', 'article_id']);                             // Définit une clé primaire composée des colonnes 'campagne_id' et 'article_id'
            $table->timestamps();                                                       // Colonnes "created_at" et "updated_at" de type timestamp

            $table->foreignId('article_id')->constrained()->onDelete('cascade');        // Colonne "article_id" de type clé étrangère liée à la table "articles" avec suppression en cascade
            $table->foreignId('campagne_id')->constrained()->onDelete('cascade');       // Colonne "campagne_id" de type clé étrangère liée à la table "campagnes" avec suppression en cascade
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campagnes_articles');                                     // Supprime la table "campagnes_articles" si elle existe
    }
};
