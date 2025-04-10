<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApogeeUser extends Model
{
    protected $fillable = [
        'acces_apogee_statut'
    ];
    protected $casts = [
        'centre_gestion' => 'array',
        'centre_traitement' => 'array',
        'centre_inscription_pedagogique' => 'array',
        'centre_incompatibilite' => 'array',
        'privileges_apogee' => 'array',
        'responsable_apogee_access' => 'array'
    ];
}
