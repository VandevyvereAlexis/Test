<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;              // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Database\Eloquent\Model;                             // Importe la classe Model

class Role extends Model
{
    use HasFactory;                                                 // Utilise le trait HasFactory dans la classe Role

    //nom au pluriel car un rôle peut regrouper plusieurs users
    // cardinalité 1,n
    public function users()
    {
        return $this->hasMany(User::class);                         // Définit une relation de un à plusieurs avec le modèle User, où un rôle peut regrouper plusieurs utilisateurs
    }
}