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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();                                                           // Colonne "id" auto-incrémentée, clé primaire
            $table->timestamps();                                                   // Colonnes "created_at" et "updated_at" de type timestamp
            $table->text('commentaire', 1200);                                      // Colonne "commentaire" de type texte avec une limite de 1200 caractères
            $table->integer('note');                                                // Colonne "note" de type entier

            $table->foreignId('user_id')->constrained()->onDelete('cascade');       // Colonne "user_id" de type clé étrangère liée à la table "users" avec suppression en cascade
            $table->foreignId('article_id')->constrained()->onDelete('cascade');    // Colonne "article_id" de type clé étrangère liée à la table "articles" avec suppression en cascade
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');                                               // Supprime la table "avis" si elle existe
    }
};
