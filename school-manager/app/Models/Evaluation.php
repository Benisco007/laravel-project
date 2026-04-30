<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    // Ajoute ce bloc pour autoriser l'enregistrement des données
    protected $fillable = [
        'user_id',
        'professeur_nom',
        'note',
        'commentaire',
    ];
}
