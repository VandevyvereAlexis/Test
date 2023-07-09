<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;                  // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Database\Eloquent\Model;                                 // Importe la classe Model

class Gamme extends Model
{
    use HasFactory;                                                     // Utilise le trait HasFactory dans la classe Gamme

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
    ];

    //nom au pluriel car plusieurs articles peuvent être associés à une gamme
    // cardinalité 1,n
    public function articles()
    {
        return $this->hasMany(Article::class);                          // Définit une relation de un à plusieurs avec le modèle Article, où une gamme peut contenir plusieurs articles
    }
}