<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;      // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Database\Eloquent\Model;                     // Importe la classe Model

class Adresse extends Model
{
    use HasFactory;                                         // Utilise le trait HasFactory dans la classe Adresse

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'adresse',
        'code_postal',
        'ville',
    ];

    //nom au singulier car une adresse peut être associée qu'à un user
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);               // Définit une relation de clé étrangère avec le modèle User
    }
}
