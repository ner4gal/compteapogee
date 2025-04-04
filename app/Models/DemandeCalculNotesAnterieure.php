<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeCalculNotesAnterieure extends Model
{
    use HasFactory;

    // Ensure the table name matches your migration.
    protected $table = 'demande_calcul_notes_anterieures';

    // Add 'semesters' to the fillable array.
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'etablissement',
        'NomPrenomETD',
        'NumETD',
        'date_demande',
        'cycle',
        'filiere',
        'annee_universitaire',
        'semesters',      // new field for semesters
        'nom_demande',
    ];

    // Cast the date and semesters fields to proper types.
    protected $casts = [
        'date_demande' => 'date',
        'semesters' => 'array', // Automatically converts JSON to an array and vice versa.
    ];
}
