<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;                                                              // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Database\Eloquent\Model;                                                                             // Importe la classe Model

class Article extends Model
{
    use HasFactory; // Utilise le trait HasFactory dans la classe Article

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gamme_id',
        'nom',
        'description',
        'description_detaillee',
        'image',
        'prix',
        'stock',
    ];

    //nom au singulier car un article peut être associé qu'à une seule gamme
    // cardinalité 1,1
    public function gamme()
    {
        return $this->belongsTo(Gamme::class);                                                                      // Définit une relation de clé étrangère avec le modèle Gamme
    }

    //nom au pluriel car plusieurs articles peuvent être mis dans les favoris
    // cardinalité 0,n
    public function favoris()
    {
        return $this->belongsToMany(User::class,'favoris');                                                         // Définit une relation de plusieurs à plusieurs avec le modèle User via la table de liaison 'favoris'
    }

    //nom au pluriel car plusieurs articles peuvent avoir un avis
    // cardinalité 0,n
    public function avis()
    {
        return $this->hasMany(Avis::class);                                                                         // Définit une relation de un à plusieurs avec le modèle Avis
    }

    //nom au pluriel car plusieurs articles peuvent être dans plusieurs commandes
    // cardinalité 0,n
    public function commandes()
    {
        return $this->belongsToMany(Commande::class,'commandes_articles')->withPivot(['quantite','reduction']);     // Définit une relation de plusieurs à plusieurs avec le modèle Commande via la table de liaison 'commandes_articles', en incluant les champs supplémentaires 'quantite' et 'reduction'
    }

    //nom au pluriel car plusieurs articles peuvent être dans plusieurs campagnes
    // cardinalité 0,n
    public function campagnes()
    {
        return $this->belongsToMany(Campagne::class,'campagnes_articles');                                          // Définit une relation de plusieurs à plusieurs avec le modèle Campagne via la table de liaison 'campagnes_articles'
    }
}