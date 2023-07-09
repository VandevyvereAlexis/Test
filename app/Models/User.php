<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;                  // Importe le trait HasFactory pour utiliser les factories avec le modèle
use Illuminate\Foundation\Auth\User as Authenticatable;                 // Importe la classe Authenticatable qui fournit l'implémentation de base de l'authentification
use Illuminate\Notifications\Notifiable;                                // Importe le trait Notifiable pour gérer les notifications
use Laravel\Sanctum\HasApiTokens;                                       // Importe le trait HasApiTokens pour gérer les jetons d'API avec Sanctum

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;                           // Utilise les traits HasApiTokens, HasFactory et Notifiable dans la classe User

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //nom au pluriel car un user peut avoir plusieurs adresses (adresse livraison et facturation)
    // cardinalité 0,n
    public function adresses()
    {
        return $this->hasMany(Adresse::class);                          // Définit une relation de un à plusieurs avec le modèle Adresse, où un utilisateur peut avoir plusieurs adresses
    }

    //nom au pluriel car un user peut avoir plusieurs commandes
    // cardinalité 0,n
    public function commandes()
    {
        return $this->hasMany(Commande::class);                         // Définit une relation de un à plusieurs avec le modèle Commande, où un utilisateur peut avoir plusieurs commandes
    }

    //nom au pluriel car un user peut avoir plusieurs avis
    // cardinalité 0,n
    public function avis()
    {
        return $this->hasMany(Avis::class);                             // Définit une relation de un à plusieurs avec le modèle Avis, où un utilisateur peut avoir plusieurs avis
    }

    //nom au pluriel car un user peut avoir plusieurs articles en favoris
    // cardinalité 0,n
    public function favoris()
    {
        return $this->belongsToMany(Article::class,'favoris');          // Définit une relation de plusieurs à plusieurs avec le modèle Article via la table de liaison 'favoris', représentant les articles favoris d'un utilisateur
    }

    //nom de la fonction au singulier car un utilisateur est associé à un seul rôle
    // cardinalité 1,1
    public function role()
    {
        return $this->belongsTo(Role::class);                           // Définit une relation de clé étrangère avec le modèle Role, représentant le rôle d'un utilisateur
    }

    public function isAdmin()
    {
        //return $this->role == "admin";
        return $this->role_id == 2;                                     // Vérifie si l'utilisateur a le rôle d'administrateur en comparant l'identifiant du rôle (2 pour admin)
    }
}
