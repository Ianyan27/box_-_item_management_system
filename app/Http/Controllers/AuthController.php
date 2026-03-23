<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try {
            $googleUser = Socialite::driver('google')->user();

            $email = $googleUser->getEmail();

            $user = User::firstOrCreate(
                ['email' => $email],
                ['name' => $googleUser->getName()]
            );

            if (!$user) {
                return redirect()->route('/')
                    ->with('error', 'Unauthorized user.');
            }

            Auth::login($user);

            return redirect()->route('box.dashboard');

        } catch (\Throwable $e) {
            Log::error('[GoogleCallback]', ['error' => $e->getMessage()]);

            return redirect()->route('/')
                ->with('error', 'Authentication failed.');
        }
    }
}
