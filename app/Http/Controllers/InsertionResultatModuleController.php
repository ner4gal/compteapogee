<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResulataModule;
use PDF;

class InsertionResultatModuleController extends Controller
{
    public function generatePDF(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'etbl' => 'required',
            'dateDM' => 'required|date',
            'typ' => 'required',
            'flr' => 'required',
            'module' => 'required',
            'nrtDM' => 'required',
            'Semestre' => 'required',
            'AnneeCon' => 'required',
            'raso' => 'required',
            'ResP' => 'required',
            'Cordi' => 'required',
            'students' => 'required|array|min:1',
            'students.*.apogee' => 'required',
            'students.*.name' => 'required',
            'students.*.session' => 'required',
            'students.*.note_initiale' => 'required',
            'students.*.note_corrigee' => 'required',
            'statut'    => 'sometimes|string',
            
        ]);
        $user = auth()->user();
        $dataToStore = [
            'user_id'        => auth()->id(),
            'user_email'     => auth()->user()->email,
            'user_name'      => auth()->user()->name,
            'etablissement'  => $validatedData['etbl'],
            'date_demande'   => $validatedData['dateDM'],
            'cycle'          => $validatedData['typ'],
            'filiere'        => $validatedData['flr'],
            'module_nom'     => $validatedData['module'],
            'nature_demande' => $validatedData['nrtDM'],
            'Semestre'       => $validatedData['Semestre'],
            'annee_inscription' => $validatedData['AnneeCon'],
            'raison_retard'  => $validatedData['raso'],
            'responsable_module' => $validatedData['ResP'], // ✅ Add this line
            'coordinateur_filiere' => $validatedData['Cordi'], // ✅ Add this too
            'students'       => $validatedData['students'],
            'statut'         => $request->input('statut', 'En attente'),
            'nom_demande'    => "Demande d'insertion ou modification d'un résultat des années antérieures (Par Module)"
        ];
        
        ResulataModule::create($dataToStore);

        // Generate PDF
        $pdf = PDF::loadView('pdf.insertion-resultat-module-pdf', ['data' => $validatedData])
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Insertion_Resultat_Module.pdf');
    }
    public function show($id)
{
    $demand = ResulataModule::findOrFail($id);
    return view('insertion-resultat-module.show', compact('demand'));
}
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'etbl' => 'required',
        'dateDM' => 'required|date',
        'typ' => 'required',
        'flr' => 'required',
        'module' => 'required',
        'nrtDM' => 'required',
        'Semestre' => 'required',
        'AnneeCon' => 'required',
        'ResP' => 'required',
        'Cordi' => 'required',
        'raso' => 'required',
        'students' => 'required|array|min:1',
        'students.*.apogee' => 'required',
        'students.*.name' => 'required',
        'students.*.session' => 'required',
        'students.*.note_initiale' => 'required',
        'students.*.note_corrigee' => 'required',
    ]);

    $demand = ResulataModule::findOrFail($id);

    $demand->update([
        'etablissement' => $validated['etbl'],
        'date_demande' => $validated['dateDM'],
        'cycle' => $validated['typ'],
        'filiere' => $validated['flr'],
        'module_nom' => $validated['module'],
        'nature_demande' => $validated['nrtDM'],
        'Semestre' => $validated['Semestre'],
        'annee_inscription' => $validated['AnneeCon'],
        'responsable_module' => $validated['ResP'],
        'coordinateur_filiere' => $validated['Cordi'],
        'raison_retard' => $validated['raso'],
        'students' => $validated['students'],
    ]);

    // Prepare data for PDF view
    $pdfData = $validated;
    $pdf = PDF::loadView('pdf.insertion-resultat-module-pdf', ['data' => $pdfData])
              ->setPaper('a4', 'portrait');

    return $pdf->download('resultat_module_corrige.pdf');
}

}
