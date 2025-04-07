<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnulationInscription; // Update the model name here
use PDF;

class AnnulationInscriptionAnneeAnterieureController extends Controller
{
    /**
     * Display the annulment form.
     */
    public function showForm()
    {
        return view('annulation-inscription-annee-anterieure');
    }

    /**
     * Generate the PDF for the annulment request.
     */
    public function generatePDF(Request $request)
    {
        // Validate the incoming request and include the optional "statut" field.
        $validatedData = $request->validate([
            'etbl'      => 'required',
            'dateDM'    => 'required|date',
            'typ'       => 'required',
            'flr'       => 'required',
            'aneINS'    => 'required',
            'mtf'       => 'required', // Holds the annulment reason.
            'students'  => 'required|array|min:1',
            'students.*.apogee' => 'required',
            'students.*.name'   => 'required',
            'statut'    => 'sometimes|string'
        ]);

        // Save the annulment request record to the database.
        // If "statut" is not provided, it defaults to "En attente".
        $record = AnnulationInscription::create([
            'user_id'           => auth()->id(),
            'user_email'        => auth()->user()->email,
            'user_name'         => auth()->user()->name,
            'etablissement'     => $validatedData['etbl'],
            'date_demande'      => $validatedData['dateDM'],
            'cycle'             => $validatedData['typ'],
            'filiere'           => $validatedData['flr'],
            'annee_inscription' => $validatedData['aneINS'],
            'raison_retard'     => $validatedData['mtf'], // In this context, the annulment reason.
            'students'          => $validatedData['students'],
            'nom_demande'       => "Demande d'annulation d'inscription administrative à une année antérieure",
            'statut'            => $validatedData['statut'] ?? 'En attente'
        ]);

        // Generate the PDF using the validated data.
        // Ensure you have a Blade view file for the PDF (e.g., "pdf.annulation-inscription-annee-anterieure-pdf")
        $pdf = PDF::loadView('pdf.annulation-inscription-annee-anterieure-pdf', ['data' => $validatedData])
                  ->setPaper('a4', 'portrait');

        // Return the generated PDF as a download.
        return $pdf->download('Demande_Annulation_Inscription_Annee_Anterieure.pdf');
    }
    public function show($id)
    {
        $demand = AnnulationInscription::findOrFail($id);
        return view('annulation-inscription.show', compact('demand'));
    }
}
