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
    
        $allowedRoutes = [
            'Profile',
            'apogee-user.store',
            'apogee-user.pdf',
            'logout',
            'generate.doc',
            'CreateAppogetDemand',
            'AppogetConfirme'
        ];
    
        if (in_array($request->route()->getName(), $allowedRoutes)) {
            return $next($request);
        }
    
        if ($user && strtolower(trim($user->email)) === 'karim.elalkaoui1@uit.ac.ma') {
            return $next($request);
        }
    
        $apogeeUser = ApogeeUser::where('email', $user->email)->first();
    
        if (!$apogeeUser) {
            return redirect()->route('Profile')->with('error', 'Veuillez compléter votre profil Apogée d\'abord.');
        }
    
        if ($apogeeUser->acces_apogee_statut !== 'Accès accordé') {
            return redirect()->route('Profile')->with('warning', 'Votre demande d\'accès est encore en traitement. Statut actuel: ' . $apogeeUser->acces_apogee_statut);
        }
    
        return $next($request);
    }
}