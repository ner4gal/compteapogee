<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApogeeUser;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    // Redirect user to Google OAuth page
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->with(['hd' => 'uit.ac.ma']) // Restrict to UIT domain
            ->redirect();
    }

    // Handle Google OAuth Callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Restrict access to UIT emails only
            if (!str_ends_with($googleUser->email, '@uit.ac.ma')) {
                return Redirect::to('/')->with('error', 'Only UIT emails are allowed.');
            }

            // Store user info in session (optional)
            session([
                'name' => $googleUser->getName(),
                'avatar' => $googleUser->getAvatar(),
            ]);

            // Check if user already exists or create
            $user = User::updateOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt(str()->random(16)),
                ]
            );

            // Log in the user
            Auth::login($user);

            // Add an inline check for the admin
            if (trim(strtolower($user->email)) === 'karim.elalkaoui1@uit.ac.ma') {
                return redirect()->route('admindashboard');
            }

            // Check if they already filled the APOGEE form
            $apogeeUser = ApogeeUser::where('email', $user->email)->first();

            if ($apogeeUser) {
                return redirect()->route('home'); // Dashboard or main page
            } else {
                return redirect()->route('Profile'); // Send to Profile (APOGEE form)
            }
        } catch (\Exception $e) {
            return Redirect::to('/')->with('error', 'Authentication failed. Please try again.');
        }
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'You have been logged out.');
    }
}
