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
        Schema::create('roles', function (Blueprint $table) 
        {
            $table->id();                   // Colonne "id" auto-incrémentée, clé primaire
            $table->string('role', 20);     // Colonne "role" de type chaîne de caractères, longueur maximale de 20 caractères
            $table->timestamps();           // Colonnes "created_at" et "updated_at" de type timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');      // Supprime la table "roles" si elle existe
    }
};