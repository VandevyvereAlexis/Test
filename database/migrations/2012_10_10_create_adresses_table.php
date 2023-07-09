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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();                                                           // Colonne "id" auto-incrémentée, clé primaire
            $table->string('adresse', 100);                                         // Colonne "adresse" de type chaîne de caractères avec une limite de 100 caractères
            $table->char('code_postal', 5);                                         // Colonne "code_postal" de type chaîne de caractères avec une limite de 5 caractères
            $table->string('ville', 50);                                            // Colonne "ville" de type chaîne de caractères avec une limite de 50 caractères
            $table->timestamps();                                                   // Colonnes "created_at" et "updated_at" de type timestamp pour les timestamps de création et de mise à jour

            $table->foreignId('user_id')->constrained()->onDelete('cascade');       // Colonne "user_id" de type clé étrangère liée à la table "users" avec suppression en cascade
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');                                           // Supprime la table "adresses" si elle existe
    }
};