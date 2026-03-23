<?php

namespace App\Http\Controllers;

use App\Mail\SendOTPmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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

    public function sendOtp(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ]);

        $otp = rand(100000, 999999);

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(5)
        ]);

        Mail::to($user->email)->send(new SendOTPmail($otp));

        return redirect()->route('otp.form')->with('email', $user->email);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        if ($user->otp !== $request->otp) {
            return back()->with('error', 'Invalid OTP');
        }

        if (now()->gt($user->otp_expires_at)) {
            return back()->with('error', 'OTP expired');
        }

        // clear OTP
        $user->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        Auth::login($user);

        return redirect()->route('box.dashboard');
    }

}
