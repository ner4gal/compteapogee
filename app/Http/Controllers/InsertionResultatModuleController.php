<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Generate PDF
        $pdf = PDF::loadView('pdf.insertion-resultat-module-pdf', ['data' => $validatedData])
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Insertion_Resultat_Module.pdf');
    }
}
