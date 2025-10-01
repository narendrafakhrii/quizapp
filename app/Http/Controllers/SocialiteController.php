<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback.
     */
    public function googleAuthentication()
    {
        try {
            /** @var \Laravel\Socialite\Two\AbstractProvider $provider */
            $provider = Socialite::driver('google');
            $googleUser = $provider->stateless()->user();

            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();

            if ($user) {
                Auth::login($user);

                // Langsung masuk ke home tanpa verifikasi email
                return redirect()->route('home');
            } else {
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make(uniqid('pass__', true)),
                ]);

                Auth::login($newUser);

                // Langsung masuk ke home tanpa verifikasi email
                return redirect()->route('home');
            }

        } catch (Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Google login failed: '.$e->getMessage());
        }
    }
}
