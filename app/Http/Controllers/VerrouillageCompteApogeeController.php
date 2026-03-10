<?php

namespace App\Http\Controllers;

use App\Models\ApogeeUser;
use App\Models\VerrouillageCompteApogee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VerrouillageCompteApogeeController extends Controller
{
    public function showForm()
    {
        $user = auth()->user();
        $apogeeUser = ApogeeUser::where('email', $user->email)->first();

        return view('demande-verrouillage-compte-apogee', compact('user', 'apogeeUser'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'etablissement' => 'required|string|max:255',
            'date_demande' => 'required|date',
            'fonction' => 'required|string|max:255',
            'nom_prenom' => 'required|string|max:255',
            'username_apogee' => 'required|string|max:255',
            'motif_verrouillage' => 'required|string',
        ]);

        $user = auth()->user();
        $nomDemande = 'Demande de Verrouillage de compte APOGEE';

        VerrouillageCompteApogee::create([
            'user_id' => $user->id,
            'user_email' => $user->email,
            'user_name' => $user->name,
            'nom_demande' => $nomDemande,
            'etablissement' => $validated['etablissement'],
            'date_demande' => $validated['date_demande'],
            'fonction' => $validated['fonction'],
            'nom_prenom' => $validated['nom_prenom'],
            'username_apogee' => $validated['username_apogee'],
            'motif_verrouillage' => $validated['motif_verrouillage'],
            'resultat_verrouillage' => $validated['motif_verrouillage'],
            'statut' => $request->input('statut', 'En attente'),
        ]);

        $data = $validated;
        $data['nom_demande'] = $nomDemande;

        $pdf = Pdf::loadView('pdf.verrouillage-compte-apogee-pdf', ['data' => $data])
            ->setPaper('a4', 'portrait');

        return $pdf->download('verrouillage_compte_apogee.pdf');
    }
}
