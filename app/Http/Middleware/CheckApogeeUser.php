<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\ApogeeUser;

class CheckApogeeUser
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        
        // Always allow these routes
        $allowedRoutes = [
            'Profile',
            'apogee-user.store',
            'apogee-user.pdf',
            'logout',
            'generate.doc',
            'CreateAppogetDemand'
        ];
        
        // Bypass for admin
        if ($user && strtolower(trim($user->email)) === 'karim.elalkaoui1@uit.ac.ma') {
            return $next($request);
        }
        
        // Check ApogeeUser record and statut
        $apogeeUser = ApogeeUser::where('email', $user->email)->first();
        
        if (!$apogeeUser) {
            return redirect()->route('Profile')
                ->with('error', 'Veuillez compléter votre profil Apogée d\'abord.');
        }
        
        if ($apogeeUser->acces_apogee_statut !== 'Accès accordé') {
            return redirect()->route('Profile')
                ->with('warning', 'Votre demande d\'accès est encore en traitement. Statut actuel: ' 
                    . $apogeeUser->acces_apogee_statut);
        }
        
        return $next($request);
    }
}