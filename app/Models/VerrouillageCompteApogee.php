<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerrouillageCompteApogee extends Model
{
    use HasFactory;

    protected $table = 'verrouillage_compte_apogees';

    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'nom_demande',
        'etablissement',
        'date_demande',
        'fonction',
        'nom_prenom',
        'username_apogee',
        'motif_verrouillage',
        'resultat_verrouillage',
        'statut',
    ];

    protected $casts = [
        'date_demande' => 'date',
    ];
}
