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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();                                                                       // Colonne "id" auto-incrémentée, clé primaire
            $table->string('nom', 100);                                                         // Colonne "nom" de type chaîne de caractères, longueur maximale de 100 caractères
            $table->string('description', 255);                                                 // Colonne "description" de type chaîne de caractères, longueur maximale de 255 caractères
            $table->text('description_detaillee');                                              // Colonne "description_detaillee" de type texte
            $table->string('image', 150);                                                       // Colonne "image" de type chaîne de caractères, longueur maximale de 150 caractères
            $table->float('prix');                                                              // Colonne "prix" de type flottant
            $table->float('note');                                                              // Colonne "note" de type flottant
            $table->integer('stock');                                                           // Colonne "stock" de type entier
            $table->timestamps();                                                               // Colonnes "created_at" et "updated_at" de type timestamp

            $table->foreignId('gamme_id')->nullable()->constrained()->onDelete('set null');     // Colonne "gamme_id" de type clé étrangère liée à la table "gammes" avec valeur nulle autorisée et suppression en cascade définie sur null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');                                                       // Supprime la table "articles" si elle existe
    }
};