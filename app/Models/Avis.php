<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;                      // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Database\Eloquent\Model;                                     // Importe la classe Model

class Avis extends Model
{
    use HasFactory; // Utilise le trait HasFactory dans la classe Avis

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'article_id',
        'commentaire',
        'note',
    ];

    //nom au singulier car un avis peut être associé qu'à un user
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);                               // Définit une relation de clé étrangère avec le modèle User
    }

    //nom au singulier car un avis peut être associé qu'à un article
    // cardinalité 1,1
    public function article()
    {
        return $this->belongsTo(Article::class);                            // Définit une relation de clé étrangère avec le modèle Article
    }
}