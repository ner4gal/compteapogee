<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ApogeeUser;
use App\Models\DoctoratInscription;
use App\Models\DemandeCalculNotesAnterieure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApogeeStatusChanged;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Retrieve all users
        $users = ApogeeUser::all();
        
        // Retrieve all Doctorat Inscription demands
        $doctoratDemands = DoctoratInscription::all();
        
        // Retrieve all Calcul des Notes demands (adjust model name as needed)
        $calculNotesDemands = DemandeCalculNotesAnterieure::all();

        // Pass the data to the admin dashboard view
        return view('admindashboard', compact('users', 'doctoratDemands', 'calculNotesDemands'));
    }
    // app/Http/Controllers/AdminDashboardController.php
public function updateStatus(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|in:Traitement en cours,Accès accordé,Accès refusé'
    ]);

    $user = ApogeeUser::findOrFail($id);
    $user->update(['acces_apogee_statut' => $validated['status']]);

    // Optional: Send email notification when status changes
    if (in_array($validated['status'], ['Accès accordé', 'Accès refusé'])) {
        Mail::to($user->email)->send(new ApogeeStatusChanged($validated['status']));
    }

    return back()->with('success', "Statut mis à jour pour {$user->nom_prenom}!");
}
}
