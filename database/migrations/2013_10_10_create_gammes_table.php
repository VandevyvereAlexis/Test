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
        Schema::create('gammes', function (Blueprint $table) {
            $table->id();                   // Colonne "id" auto-incrémentée, clé primaire
            $table->string('nom', 100);     // Colonne "nom" de type chaîne de caractères, longueur maximale de 100 caractères
            $table->timestamps();           // Colonnes "created_at" et "updated_at" de type timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gammes');     // Supprime la table "gammes" si elle existe
    }
};
