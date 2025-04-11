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
    public function update(Request $request, $id)
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
        'responsable_apogee_access' => 'nullable|string|in:T,A',
    ]);

    $user = ApogeeUser::findOrFail($id);
    $user->fill($validated);
    $user->save();

    $pdf = PDF::loadView('apogee.profile-pdf', compact('user'));
    return $pdf->download('profil_apogee_modifie.pdf');
}
public function show($id)
{
    $user = ApogeeUser::findOrFail($id);
    $apogeeUser = ApogeeUser::where('email', auth()->user()->email)->first();

    return view('apogee.show', compact('apogeeUser', 'user'));
}
public function generateModificationPDF(Request $request)
{
    // Validate and handle logic here...
    $validated = $request->validate([
        'etbl' => 'required|string',
        'dateDM' => 'required|date',
        'demNTR' => 'required|string',
        'nomPrenomUser' => 'required|string',
        'userName' => 'required|string',
        'fonction' => 'nullable|string',
        'tele' => 'nullable|string',
        'mac' => 'nullable|string',
        // Include other validations as needed
    ]);

    $pdf = PDF::loadView('pdf.apogee-modification', ['data' => $validated]);
    return $pdf->download('modification_compte_apogee.pdf');
}
public function showProfileForm()
{
    $apogeeUser = ApogeeUser::where('email', auth()->user()->email)->first();
    return view('apogee.profile-form', compact('apogeeUser'));
}

public function showCreationForm()
{
    $apogeeUser = ApogeeUser::where('email', auth()->user()->email)->first();
    return view('apogee.creation-form' ,compact('apogeeUser'));
}
public function generateDocument(Request $request)
{
    $validated = $request->validate([
        'etbl' => 'required|string|max:255',
        'dateDM' => 'required|date',
        'nomPrenomUser' => 'required|string|max:255',
        'userName' => 'required|string|max:255',
        'fonction' => 'nullable|string|max:255',
        'tele' => 'nullable|string|max:50',
        'mac' => 'nullable|string|max:255',
        'centre_gestion' => 'nullable|array',
        'centre_traitement' => 'nullable|array',
        'centre_inscription_pedagogique' => 'nullable|array',
        'centre_incompatibilite' => 'nullable|array',
        'p1' => 'nullable',
        'p2' => 'nullable',
        'p3' => 'nullable',
        'p4' => 'nullable',
        'p5' => 'nullable',
        'p6' => 'nullable',
        'p7' => 'nullable',
        'p8'=> 'nullable',
        'p9' => 'nullable|string|in:T,A',
    ]);

    $privilegesMap = [
        'p1' => 'Inscription Administrative',
        'p2' => 'Inscription Pédagogique',
        'p3' => 'Résultat',
        'p4' => 'Structure des enseignements',
        'p5' => 'Dossier Étudiant',
        'p6' => 'Modalités de contrôle des connaissances',
        'p7' => 'Épreuves',
        'p8' => 'Théses HDR', ];

    $privileges = [];
    foreach ($privilegesMap as $key => $label) {
        if ($request->has($key)) {
            $privileges[] = $label;
        }
    }

    // ✅ This avoids all "missing field" insert issues
    $apogeeUser = ApogeeUser::firstOrNew(['email' => auth()->user()->email]);

    $apogeeUser->etablissement = $validated['etbl'];
    $apogeeUser->nom_prenom = $validated['nomPrenomUser'];
    $apogeeUser->nom_utilisateur_apogee = $validated['userName'];
    $apogeeUser->fonction = $validated['fonction'] ?? null;
    $apogeeUser->telephone = $validated['tele'] ?? null;
    $apogeeUser->mac_address = $validated['mac'] ?? null;
    $apogeeUser->acces_apogee_statut = 'Traitement en cours';
    $apogeeUser->centre_gestion = $validated['centre_gestion'] ?? [];
    $apogeeUser->centre_traitement = $validated['centre_traitement'] ?? [];
    $apogeeUser->centre_inscription_pedagogique = $validated['centre_inscription_pedagogique'] ?? [];
    $apogeeUser->centre_incompatibilite = $validated['centre_incompatibilite'] ?? [];
    $apogeeUser->privileges_apogee = $privileges;
    $apogeeUser->responsable_apogee_access = $validated['p9'] ?? null;
    
    // ✅ Critical line — must not forget this!
    $apogeeUser->email = auth()->user()->email;
    
    $apogeeUser->save();
    $data = [
        'etbl' => $validated['etbl'],
        'dateDM' => $validated['dateDM'],
        'nomPrenomUser' => $validated['nomPrenomUser'],
        'userName' => $validated['userName'],
        'fonction' => $validated['fonction'] ?? '',
        'tele' => $validated['tele'] ?? '',
        'mac' => $validated['mac'] ?? '',
        'centre_gestion' => $validated['centre_gestion'] ?? [],
        'centre_traitement' => $validated['centre_traitement'] ?? [],
        'centre_inscription_pedagogique' => $validated['centre_inscription_pedagogique'] ?? [],
        'centre_incompatibilite' => $validated['centre_incompatibilite'] ?? [],
        'p1' => $request->has('p1'),
        'p2' => $request->has('p2'),
        'p3' => $request->has('p3'),
        'p4' => $request->has('p4'),
        'p5' => $request->has('p5'),
        'p6' => $request->has('p6'),
        'p7' => $request->has('p7'),
        'p8' => $request->has('p8'),
        'p9' => $validated['p9'] ?? null,
    ];

    $pdf = PDF::loadView('pdf.Apogee_pdf', ['data' => $data]);

    return $pdf->download('demande_compte_apogee.pdf');
}





}
