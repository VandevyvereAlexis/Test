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
        Schema::create('users', function (Blueprint $table) 
        {
            $table->id();                                               // Colonne "id" auto-incrémentée, clé primaire

            $table->string('nom', 100);                                 // Colonne "nom" de type chaîne de caractères avec une limite de 100 caractères

            $table->string('prenom', 100);                              // Colonne "prenom" de type chaîne de caractères avec une limite de 100 caractères

            $table->string('email', 50)->unique();                      // Colonne "email" de type chaîne de caractères avec une limite de 50 caractères, et valeur unique

            $table->timestamp('email_verified_at')->nullable();         // Colonne "email_verified_at" de type timestamp, pouvant être nulle

            $table->string('password', 255);                            // Colonne "password" de type chaîne de caractères avec une limite de 255 caractères

            $table->rememberToken();                                    // Colonne "remember_token" pour la fonctionnalité de "remember me" de l'authentification

            $table->timestamps();                                       // Colonnes "created_at" et "updated_at" de type timestamp pour les timestamps de création et de mise à jour

            $table->foreignId('role_id')->default(1)->constrained();    // Colonne "role_id" de type clé étrangère liée à la table "roles" avec la valeur par défaut 1
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');                                  // Supprime la table "users" si elle existe
    }
};
