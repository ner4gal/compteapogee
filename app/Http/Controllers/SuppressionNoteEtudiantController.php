<?php

namespace App\Http\Controllers;

use App\Models\SuppressionNoteEtudiant; // Ensure this model exists and has the required fields in $fillable.
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuppressionNoteEtudiantController extends Controller
{
    /**
     * Display the suppression form.
     */
    public function showForm()
    {
        // Returns the view for the suppression demand form.
        return view('demande-suppression-note-annee-anterieure');
    }

    /**
     * Process the form submission, store the demand (including the statut and NumApogee), and generate the PDF.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data.
        $request->validate([
            'etbl'         => 'required|string',
            'dateDM'       => 'required|date',
            'NomPrenom'    => 'required|string',
            'NumApogee'    => 'required|string', // Now validated
            'typ'          => 'required|string',
            'flr'          => 'required|string',
            'Semestre'     => 'required|string',
            'AnneeCon'     => 'required|string',
            'nrtDM'        => 'required|string',  // Should indicate "Suppression des notes"
            'raison'       => 'required|string',  // Reason for suppression
            'modules'      => 'required|array|min:1',
            'modules.*.M'  => 'required|string',  // Module name
            'modules.*.S'  => 'required|string',  // Session
            'modules.*.NI' => 'required|string',  // Note (only one note field is used)
            'statut'       => 'sometimes|string'  // Optional status field
        ]);

        // Retrieve form data.
        $data = $request->all();
        $user = auth()->user();
        $nomDemande = "Demande de suppression des notes de l'année antérieure (Par Étudiant)";

        // Save the suppression demand record.
        SuppressionNoteEtudiant::create([
            'user_id'           => $user->id,
            'user_email'        => $user->email,
            'user_name'         => $user->name,
            'etablissement'     => $request->etbl,
            'NomPrenom'         => $request->NomPrenom,
            'NumApogee'         => $request->NumApogee, // Added the NumApogee field here
            'date_demande'      => $request->dateDM,
            'cycle'             => $request->typ,
            'filiere'           => $request->flr,
            'Semestre'          => $request->Semestre,
            'annee_inscription' => $request->AnneeCon,
            'nature_demande'    => $request->nrtDM,
            'raison_retard'     => $request->raison, // Reason for suppression
            'modules'           => $request->modules,
            'nom_demande'       => $nomDemande,
            'statut'            => $request->input('statut', 'En attente')
        ]);

        // Generate the PDF using the designated Blade view.
        $pdf = Pdf::loadView('pdf.suppression-note-etudiant-pdf', ['data' => $data])
                  ->setPaper('a4', 'portrait');

        // Return the generated PDF as a downloadable file.
        return $pdf->download('suppression_note_etudiant.pdf');
    }
    public function show($id)
    {
        $demand = SuppressionNoteEtudiant::findOrFail($id);
        return view('suppression-note-etudiant.show', compact('demand'));
    }
    public function update(Request $request, $id)
{
    // Retrieve the existing demand or throw a 404 error if not found.
    $demand = \App\Models\SuppressionNoteEtudiant::findOrFail($id);

    // Validate the request data (same rules as in store, if applicable)
    $validatedData = $request->validate([
        'etbl'         => 'required|string',
        'dateDM'       => 'required|date',
        'NomPrenom'    => 'required|string',
        'NumApogee'    => 'required|string',
        'typ'          => 'required|string',
        'flr'          => 'required|string',
        'Semestre'     => 'required|string',
        'AnneeCon'     => 'required|string',
        'nrtDM'        => 'required|string',
        'raison'       => 'required|string',
        'modules'      => 'required|array|min:1',
        'modules.*.M'  => 'required|string',
        'modules.*.S'  => 'required|string',
        'modules.*.NI' => 'required|string',
        'statut'       => 'sometimes|string'
    ]);

    // Prepare the updated data
    $nomDemande = "Demande de suppression des notes de l'année antérieure (Par Étudiant)";
    $updateData = [
        'etablissement'     => $validatedData['etbl'],
        'date_demande'      => $validatedData['dateDM'],
        'NomPrenom'         => $validatedData['NomPrenom'],
        'NumApogee'         => $validatedData['NumApogee'],
        'cycle'             => $validatedData['typ'],
        'filiere'           => $validatedData['flr'],
        'Semestre'          => $validatedData['Semestre'],
        'annee_inscription' => $validatedData['AnneeCon'],
        'nature_demande'    => $validatedData['nrtDM'],
        'raison_retard'     => $validatedData['raison'],
        'modules'           => $validatedData['modules'],
        'nom_demande'       => $nomDemande,
        'statut'            => $request->input('statut', 'En attente')
    ];

    // Update the record
    $demand->update($updateData);

    // Option 1: Generate the updated PDF and return it as a download
    $pdf = Pdf::loadView('pdf.suppression-note-etudiant-pdf', ['data' => $validatedData])
            ->setPaper('a4', 'portrait');

    return $pdf->download('suppression_note_etudiant_updated.pdf');

    // Option 2: Redirect back with a success message if you don't need to re-generate the PDF.
    // return redirect()->back()->with('success', 'Demande mise à jour avec succès.');
}

}
