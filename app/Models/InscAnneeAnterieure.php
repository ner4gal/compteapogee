<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscAnneeAnterieure extends Model
{
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'etablissement',
        'date_demande',
        'cycle',
        'filiere',
        'nature_demande',
        'annee_inscription',
        'raison_retard',
        'students',
        'nom_demande',
    ];
    
    protected $casts = [
        'students' => 'array',
        'date_demande' => 'date',
    ];
    
}
