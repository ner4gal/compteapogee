<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctoratInscription extends Model
{
    use HasFactory;

    // Specify the table name (make sure it matches your migration)
    protected $table = 'insc_annee_anterieures_doctorat';

    // Fillable attributes exactly matching your migration and form field names
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'etbl',               // Etablissement
        'ced',                // CED
        'dateDM',             // Date de la demande
        'nomPrenom',          // Nom & Prénom (Doctorant)
        'date1Ins',           // Date de la 1ère inscription
        'CIN',                // CIN
        'CNE',                // CNE
        'tel',                // Numéro Telephone
        'email',              // Email Institutionnel
        'NumApogee',          // N° Apogee
        'FormationDoctorale', // Formation Doctorale
        'StructureRecherche', // Structure de Recherche
        'DirThese',           // Directeur de thèse
        'aneINS',             // Année d'inscription concernée
        'nrtDM',              // Nature de la demande
        'mtf',                // La raison du retard
        'nom_demande'         // Request name (default is set in migration)
    ];

    // Cast date fields to Carbon instances
    protected $casts = [
        'dateDM' => 'date',
        'date1Ins' => 'date',
    ];
}
