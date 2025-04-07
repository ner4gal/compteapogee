<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ResulataModule extends Model
{
    use HasFactory;

    // Explicitly specify the table name (if it doesn't follow Laravel's naming conventions)
    protected $table = 'insc_resultat_par_module';

    // Fillable attributes for mass assignment.
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
        'module_nom',
        'students',
        'nom_demande',
         'statut'
    ];

    // Cast fields to native types.
    protected $casts = [
        'date_demande' => 'date',
        'students'     => 'array',  // converts JSON to array automatically
    ];
}
