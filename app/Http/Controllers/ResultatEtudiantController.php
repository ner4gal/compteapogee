<?php

namespace App\Http\Controllers;
use App\Models\ResultatEtudiant;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultatEtudiantController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'etbl' => 'required|string',
            'dateDM' => 'required|date',
            'NomPrenom' => 'required|string',
            'NumApogee' => 'required|string',
            'typ' => 'required|string',
            'flr' => 'required|string',
            'Semestre' => 'required|string',
            'AnneeCon' => 'required|string',
            'nrtDM' => 'required|string',
            'raison' => 'required|string',
            
            // Validate each module input
            'modules' => 'required|array|min:1',
            'modules.*.M' => 'required|string', // Module name
            'modules.*.S' => 'required|string', // Session
            'modules.*.NI' => 'required|string', // Note Initiale (can be numeric if preferred)
            'modules.*.NC' => 'required|string', // Note Corrigée
            'statut'    => 'sometimes|string',
        ]);

        // Retrieve all data from the request
        $data = $request->all();
            // Store the form submission
            $user = auth()->user();
            $nomDemande = "Demande d'insertion ou modification d'un résultat des années antérieures sur le système APOGEE (Par Étudiant)";

    ResultatEtudiant::create([
        'user_id'         => $user->id,
        'user_email'      => $user->email,
        'user_name'       => $user->name,
        'etablissement'   => $request->etbl,
        'NomPrenom' => $request->NomPrenom,
        'date_demande'    => $request->dateDM,
        'cycle'           => $request->typ,
        'filiere'         => $request->flr,
        'nature_demande'  => $request->nrtDM,
        'annee_inscription'=> $request->AnneeCon,
        'raison_retard'   => $request->raison,
        'modules'        => $request->modules,
        'nom_demande'     => $nomDemande,  // Override the default with the dynamic value.
        'statut'            => $request->input('statut', 'En attente')
    ]);

        // Generate the PDF using a Blade view located at resources/views/pdfs/resultat_etudiant.blade.php
        $pdf = Pdf::loadView('pdf.insertion-resultat-etudiant-pdf', ['data' => $data]);

        // Download the PDF
        return $pdf->download('insertion_resultat_etudiant.pdf');
    }
   public function show($id)
{
    $demande = ResultatEtudiant::findOrFail($id);
    $etablissements = [
        'Faculté des Langues des Lettres et des Arts',
        'Faculté des Sciences Humaines et Sociales',
        'Faculté des Sciences',
        'Faculté d\'Economie et de Gestion',
        'Faculté des Sciences Juridiques et Politiques',
        'Ecole Nationale de Commerce et de Gestion',
        'Ecole Nationale des Sciences Appliquées',
        'Ecole Supérieure de Technologie',
        'Ecole Nationale Supérieure de Chimie',
        'Ecole Supérieure d\'Education et de Formation',
        'Institut des Métiers de Sport'
    ];
    return view('insertion-resultat-etudiant.show', compact('demande', 'etablissements'));
}
}
