<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs qui peuvent être remplis massivement.
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'role',
        'langue_souhaitee',
        'duree_formation',
        'niveau',
    ];

    /**
     * Les attributs à cacher pour les tableaux de sortie (JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Le cast des attributs.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
