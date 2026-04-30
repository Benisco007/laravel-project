<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = ['titre', 'professeur', 'salle', 'date_debut', 'date_fin'];
}
