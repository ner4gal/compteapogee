<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultatEtudiant extends Model
{
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'etablissement',      // Changed from 'etbl'
        'date_demande',       // Changed from 'dateDM'
        'NomPrenom',
        'NumApogee',
        'cycle',              // Changed from 'typ'
        'filiere',            // Changed from 'flr'
        'annee_inscription',  // Changed from 'AnneeCon'
        'Semestre',
        'nature_demande',     // Changed from 'nrtDM'
        'modules',
        'raison_retard',      // Changed from 'raison'
        'nom_demande',
    ];

    // Automatically cast modules to and from JSON
    protected $casts = [
        'modules' => 'array',
        'date_demande' => 'date',
    ];
}
