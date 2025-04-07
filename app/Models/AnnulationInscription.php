<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnulationInscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'etablissement',
        'date_demande',
        'cycle',
        'filiere',
        'annee_inscription',
        'raison_retard', // Holds the annulment reason
        'students',      // This should be stored as a JSON field in your database
        'nom_demande',
        'statut'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'students'     => 'array',  // Automatically converts the students JSON column to an array.
        'date_demande' => 'date',   // Automatically casts date_demande to a Carbon instance.
    ];
}
