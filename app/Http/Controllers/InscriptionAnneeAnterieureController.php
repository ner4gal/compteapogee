<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\InscAnneeAnterieure;
use PDF;

class InscriptionAnneeAnterieureController extends Controller
{
    public function showForm()
    {
        return view('inscription-annee-anterieure');
    }

    public function generatePDF(Request $request)
    {
          // Validate input
    $validatedData = $request->validate([
        'etbl' => 'required',
        'dateDM' => 'required|date',
        'typ' => 'required',
        'flr' => 'required',
        'nrtDM' => 'required',
        'aneINS' => 'required',
        'mtf' => 'required',
        'students' => 'required|array|min:1', // At least one student required
        'students.*.apogee' => 'required',
        'students.*.name' => 'required',
    ]);
     // Save to DB
     $record = InscAnneeAnterieure::create([
        'user_id' => auth()->id(),
        'user_email'      => auth()->user()->email,
        'user_name'       => auth()->user()->name,
        'etablissement' => $validatedData['etbl'],
        'date_demande' => $validatedData['dateDM'],
        'cycle' => $validatedData['typ'],
        'filiere' => $validatedData['flr'],
        'nature_demande' => $validatedData['nrtDM'],
        'annee_inscription' => $validatedData['aneINS'],
        'raison_retard' => $validatedData['mtf'],
        'students' => $validatedData['students'],
        'nom_demande' => 'Demande d’inscription administrative à une annèe antèrieure'
    ]);
    $data = $validatedData;
    // Generate PDF with A4 format
    $pdf = PDF::loadView('pdf.inscription-annee-anterieure-pdf', ['data' => $validatedData])
              ->setPaper('a4', 'portrait'); // Set A4 size

    return $pdf->download('Demande_Inscription_Annee_Anterieure.pdf');
    }
}
