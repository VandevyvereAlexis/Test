<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;                          // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Database\Eloquent\Model;                                         // Importe la classe Model

class Campagne extends Model
{
    use HasFactory;                                                             // Utilise le trait HasFactory dans la classe Campagne

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_debut',
        'date_fin',
        'nom',
        'reduction',
    ];

    //nom au pluriel car plusieurs articles peuvent être dans plusieurs campagnes
    // cardinalité 1,n
    public function articles()
    {
        return $this->belongsToMany(Article::class,'campagnes_articles');       // Définit une relation de plusieurs à plusieurs avec le modèle Article via la table de liaison 'campagnes_articles'
    }
}