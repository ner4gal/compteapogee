<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CompteFonctionnelApogeeGoogleDocsController extends Controller
{
    public function generateDocument(Request $request)
    {
        $data = [
            'etbl' => $request->input('etbl'),
            'dateDM' => $request->input('dateDM'),
            'nomPrenomUser' => $request->input('nomPrenomUser'),
            'userName' => $request->input('userName'),
            'fonction' => $request->input('fonction'),
            'centre_gestion' => $request->input('centre_gestion', []),
            'centre_traitement' => $request->input('centre_traitement', []),
            'centre_inscription_pedagogique' => $request->input('centre_inscription_pedagogique', []),
            'centre_incompatibilite' => $request->input('centre_incompatibilite', []),
            'tele' => $request->input('tele'),
            'mac' => $request->input('mac'),
            'p1' => $request->has('p1'),
            'p2' => $request->has('p2'),
            'p3' => $request->has('p3'),
            'p4' => $request->has('p4'),
            'p5' => $request->has('p5'),
            'p6' => $request->has('p6'),
            'p7' => $request->has('p7'),
            'p8' => $request->input('p8'), // "T" or "A"
        ];

        $pdf = Pdf::loadView('pdf.Apogee_pdf', ['data' => $data]);

        return $pdf->download('demande_compte_apogee.pdf');
    }
}