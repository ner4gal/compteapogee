<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ApogeeUser;
use App\Models\DoctoratInscription;
use App\Models\DemandeCalculNotesAnterieure;
use Illuminate\Http\Request;

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
}
