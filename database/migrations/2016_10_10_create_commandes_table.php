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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();                                                                                       // Colonne "id" auto-incrémentée, clé primaire
            $table->string('numero', 7);                                                                        // Colonne "numero" de type chaîne de caractères, longueur maximale de 7 caractères
            $table->float('prix');                                                                              // Colonne "prix" de type flottant
            $table->timestamps();                                                                               // Colonnes "created_at" et "updated_at" de type timestamp

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');                      // Colonne "user_id" de type clé étrangère liée à la table "users" avec valeur nulle autorisée et suppression en cascade définie sur null
            
            $table->unsignedBigInteger('adresse_livraison_id')->nullable();                                     // Colonne "adresse_livraison_id" de type entier non signé avec valeur nulle autorisée
            $table->foreign('adresse_livraison_id')->references('id')->on('adresses')->onDelete('set null');    // Clé étrangère "adresse_livraison_id" liée à la table "adresses" avec suppression en cascade définie sur null

            $table->unsignedBigInteger('adresse_facturation_id')->nullable();                                   // Colonne "adresse_facturation_id" de type entier non signé avec valeur nulle autorisée
            $table->foreign('adresse_facturation_id')->references('id')->on('adresses')->onDelete('set null');  // Clé étrangère "adresse_facturation_id" liée à la table "adresses" avec suppression en cascade définie sur null
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');                                                                      // Supprime la table "commandes" si elle existe
    }
};
