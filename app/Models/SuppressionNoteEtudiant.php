<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppressionNoteEtudiant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'NomPrenom',        // Student's full name
        'NumApogee',        // Student number (APOGEE)
        'etablissement',
        'date_demande',
        'cycle',
        'filiere',
        'Semestre',
        'annee_inscription',
        'nature_demande',
        'raison_retard',    // Reason for suppression
        'modules',
        'nom_demande',
        'statut'            // Status of the demand
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'modules'     => 'array',
        'date_demande'=> 'date',
    ];
}
