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
        'statut'    => 'sometimes|string',
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
        'nom_demande' => 'Demande d’inscription administrative à une annèe antèrieure',
        'statut'            => $request->input('statut', 'En attente')
    ]);
    $data = $validatedData;
    // Generate PDF with A4 format
    $pdf = PDF::loadView('pdf.inscription-annee-anterieure-pdf', ['data' => $validatedData])
              ->setPaper('a4', 'portrait'); // Set A4 size

    return response($pdf->output(), 200)
    ->header('Content-Type', 'application/pdf')
    ->header('Content-Disposition', 'inline; filename="Demande_Inscription_Annee_Anterieure.pdf"');

    }
    public function showInscription($id)
    {
        $demande = InscAnneeAnterieure::findOrFail($id);
    
    // Ensure students is always an array
    $students = is_string($demande->students) 
        ? json_decode($demande->students, true) 
        : (array)$demande->students;
    
    return view('inscription-annee-anterieure.show', [
        'demande' => $demande,
        'students' => $students
    ]);
        
    }
    public function update(Request $request, $id)
{
    $record = InscAnneeAnterieure::findOrFail($id);
    
    // Update record first
    $record->update([
        'etablissement' => $request->input('etbl', $record->etablissement),
        'date_demande' => $request->input('dateDM', $record->date_demande),
        // ... other fields
    ]);
    
    // Prepare complete data for PDF
    $pdfData = [
        'etbl' => $record->etablissement,
        'dateDM' => $record->date_demande->format('d/m/Y'),
        'typ' => $record->cycle,
        'flr' => $record->filiere,
        'nrtDM' => $record->nature_demande,
        'aneINS' => $record->annee_inscription,
        'mtf' => $record->raison_retard,
        'students' => $record->students,
        'statut' => $record->statut
    ];
    
    $pdf = PDF::loadView('pdf.inscription-annee-anterieure-pdf', ['data' => $pdfData])
              ->setPaper('a4', 'portrait');
              
    return $pdf->download('Demande_Inscription_Annee_Anterieure_Updated.pdf');
}
}
