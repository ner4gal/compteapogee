<?php

namespace App\Http\Controllers;

use App\Models\ApogeeUser;
use Illuminate\Http\Request;
use PDF;

class ApogeeUserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etablissement' => 'required|string|max:255',
            'nom_prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'fonction' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:50',
            'nom_utilisateur_apogee' => 'required|string|max:255',
            'mac_address' => 'nullable|string|max:255',
            
            'centre_gestion' => 'nullable|array',
            'centre_traitement' => 'nullable|array',
            'centre_inscription_pedagogique' => 'nullable|array',
            'centre_incompatibilite' => 'nullable|array',
            'privileges_apogee' => 'nullable|array',
            'responsable_apogee_access' => 'nullable|array'
        ]);

        $user = new ApogeeUser();
        $user->etablissement = $validated['etablissement'];
        $user->nom_prenom = $validated['nom_prenom'];
        $user->email = $validated['email'];
        $user->fonction = $validated['fonction'] ?? null;
        $user->telephone = $validated['telephone'] ?? null;
        $user->nom_utilisateur_apogee = $validated['nom_utilisateur_apogee'];
        $user->mac_address = $validated['mac_address'] ?? null;

        // For array fields, default to an empty array if not provided
        $user->centre_gestion = $validated['centre_gestion'] ?? [];
        $user->centre_traitement = $validated['centre_traitement'] ?? [];
        $user->centre_inscription_pedagogique = $validated['centre_inscription_pedagogique'] ?? [];
        $user->centre_incompatibilite = $validated['centre_incompatibilite'] ?? [];
        $user->privileges_apogee = $validated['privileges_apogee'] ?? [];
        $user->responsable_apogee_access = $validated['responsable_apogee_access'] ?? [];

        // Set the processing status directly in the controller.
        // You can change the value here as needed (e.g., 'Accès accordé' or 'Accès refusé').
        $user->acces_apogee_statut = 'Traitement en cours';

        $user->save();

        return redirect()->route('home')->with('success', 'Votre profil APOGEE a été enregistré avec succès.');
    }
    
    public function downloadPDF()
    {
        $apogeeUser = ApogeeUser::where('email', auth()->user()->email)->firstOrFail();
        $pdf = PDF::loadView('apogee.profile-pdf', compact('apogeeUser'));
        return $pdf->download('profil_apogee.pdf');
    }
}
