<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

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

                if (! $user->hasVerifiedEmail()) {
                    // langsung kirim verifikasi tanpa queue
                    $user->sendEmailVerificationNotification();
                    return redirect()->route('verification.notice');
                }

                return redirect()->route('home');
            } else {
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make(uniqid('pass__', true)),
                ]);

                Auth::login($newUser);

                // langsung kirim email verifikasi
                $newUser->sendEmailVerificationNotification();

                return redirect()->route('verification.notice');
            }

        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Google login failed: ' . $e->getMessage());
        }
    }
}
