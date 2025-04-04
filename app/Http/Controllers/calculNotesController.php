<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DemandeCalculNotesAnterieure;

class calculNotesController extends Controller
{
    public function create()
    {
        // Return the Blade view that contains your form
        return view('calcul_note');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data.
        $validatedData = $request->validate([
            'etbl'           => 'required|string', // Institution from form select
            'dateDM'         => 'required|date',   // Date of Request
            'NomPrenomETD'   => 'required|string', // Name & Surname
            'NumETD'         => 'required|string', // APOGEE Number
            'cycle'          => 'required|string', // Cycle
            'filiere'        => 'required|string', // Filière
            'AnneeCon'       => 'required|string', // Academic Year (Année concernée)
            'semesters'      => 'required|array|min:1',  // Semesters checkboxes
            'semesters.*'    => 'required|string', // each semester must be a string
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Map the form fields to the database fields
        $dataToStore = [
            'user_id'            => $user->id,
            'user_email'         => $user->email,
            'user_name'          => $user->name,
            'etablissement'      => $validatedData['etbl'],
            'date_demande'       => $validatedData['dateDM'],
            'NomPrenomETD'       => $validatedData['NomPrenomETD'],
            'NumETD'             => $validatedData['NumETD'],
            'cycle'              => $validatedData['cycle'],
            'filiere'            => $validatedData['filiere'],
            'annee_universitaire'=> $validatedData['AnneeCon'],
            'semesters'          => $validatedData['semesters'],
            // "nom_demande" is set by default in the migration,
            // but you can override it here if needed.
        ];

        // Create the record in the database
        DemandeCalculNotesAnterieure::create($dataToStore);

        // Optionally, generate a PDF using the validated data.
        $pdf = Pdf::loadView('pdf.demande_calcul_notes_pdf', ['data' => $validatedData])
                  ->setPaper('a4', 'portrait');

        // Return the PDF as a download.
        return $pdf->download('Demande_Calcul_Notes.pdf');
    }
}
