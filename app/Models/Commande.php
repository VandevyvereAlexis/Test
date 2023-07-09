<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;                                                              // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Database\Eloquent\Model;                                                                             // Importe la classe Model

class Commande extends Model
{
    use HasFactory;                                                                                                 // Utilise le trait HasFactory dans la classe Commande

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'numero',
        'adresse_livraison_id',
        'adresse_facturation_id',
        'prix',
    ];

    //nom au singulier car une commande peut être associée qu'à un user
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);                                                                       // Définit une relation de clé étrangère avec le modèle User
    }

    //nom au pluriel car plusieurs articles peuvent être associés à plusieurs commandes
    // cardinalité 1,n
    public function articles()
    {
        //withPivot(array('quantite','reduction')) = car on rajoute 2 champs supplémentaires : quantite et reduction
        return $this->belongsToMany(Article::class,'commandes_articles')->withPivot(['quantite','reduction']);      // Définit une relation de plusieurs à plusieurs avec le modèle Article via la table de liaison 'commandes_articles', en incluant les champs supplémentaires 'quantite' et 'reduction'
    }
}
