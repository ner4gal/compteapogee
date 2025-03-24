<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


             // Store user information in session
                 session([
                    'name' => $googleUser->getAvatar(),
                    'avatar' => $googleUser->getAvatar(),
                       ]);

            // Check if user already exists in the database
            $user = User::updateOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt(str()->random(16)), // Random password since it's OAuth
                ]
            );

            // Log in the user
            Auth::login($user);

            return redirect()->route('dashboard');

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
