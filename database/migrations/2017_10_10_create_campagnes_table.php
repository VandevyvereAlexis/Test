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
        Schema::create('campagnes', function (Blueprint $table) {
            $table->id();                       // Colonne "id" auto-incrémentée, clé primaire
            $table->date('date_debut');         // Colonne "date_debut" de type date pour représenter la date de début de la campagne
            $table->date('date_fin');           // Colonne "date_fin" de type date pour représenter la date de fin de la campagne
            $table->string('nom', 50);          // Colonne "nom" de type chaîne de caractères avec une limite de 50 caractères pour représenter le nom de la campagne
            $table->integer('reduction');       // Colonne "reduction" de type entier pour représenter la réduction appliquée lors de la campagne
            $table->timestamps();               // Colonnes "created_at" et "updated_at" de type timestamp pour les timestamps de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campagnes');      // Supprime la table "campagnes" si elle existe
    }
};

