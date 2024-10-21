<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable; // Inclure le trait Authenticatable

    protected $fillable = [
        'name',
        'email',
        'password',
        // ... autres attributs spécifiques
    ];

    // Protéger certains attributs de l'affichage
    protected $hidden = [
        'password', // Masquer le mot de passe
        'remember_token', // Masquer le token de session
    ];

    // Cast des attributs pour Laravel
    protected $casts = [
        'email_verified_at' => 'datetime', // Cast pour la vérification de l'email
        // ... d'autres attributs si nécessaire
    ];

    protected static function booted()
    {
        static::creating(function ($admin) {
            $admin->role_id = 1; // Ou toute autre valeur par défaut pour le rôle d'admin
        });
    }
}
