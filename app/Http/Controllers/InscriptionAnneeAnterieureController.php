<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

    // Generate PDF with A4 format
    $pdf = PDF::loadView('pdf.inscription-annee-anterieure-pdf', ['data' => $validatedData])
              ->setPaper('a4', 'portrait'); // Set A4 size

    return $pdf->download('Demande_Inscription_Annee_Anterieure.pdf');
    }
}
