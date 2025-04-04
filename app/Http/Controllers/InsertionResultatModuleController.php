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
            
        ]);
        $user = auth()->user();
        $dataToStore = [
            'user_id'         => $user->id,
            'user_email'      => $user->email,
            'user_name'       => $user->name,
            'etablissement'   => $validatedData['etbl'],
            'date_demande'    => $validatedData['dateDM'],
            'cycle'           => $validatedData['typ'],
            'filiere'         => $validatedData['flr'],
            'nature_demande'  => $validatedData['nrtDM'],
            'annee_inscription' => $validatedData['AnneeCon'],
            'raison_retard'   => $validatedData['raso'],
            'module_nom'      => $validatedData['module'],  // saving module name as module_nom
            'students'        => $validatedData['students'],
            // 'nom_demande' can be set automatically by your model or here as a computed value:
            'nom_demande'     => "Demande d'insertion ou modification d'un résultat des années antérieures (Par Module)"
        ];
        ResulataModule::create($dataToStore);

        // Generate PDF
        $pdf = PDF::loadView('pdf.insertion-resultat-module-pdf', ['data' => $validatedData])
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Insertion_Resultat_Module.pdf');
    }
}
