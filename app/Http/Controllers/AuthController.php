<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->user()->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'user' => $user,
                'token' => $token,
                'redirect' => '/dashboard'
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid email or password.'
        ], 401);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'pin' => null,
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Registration successful.',
                'user' => $user,
                'token' => $token,
                'redirect' => '/dashboard'
            ], 201);
        }

        return response()->json([
            'status' => false,
            'message' => 'Authentication failed after registration.'
        ], 500);
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::firstOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'provider_id' => $googleUser->id,
                'password' => Str::random(32),
                'pin' => null,
            ]
        );

        Auth::login($user);
        $token = $user->createToken('auth_token')->plainTextToken;

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        // Hapus semua token akses pengguna
        $request->user()->tokens()->delete();
        Auth::logout();
        Cookie::queue(Cookie::forget('user_pin'));
        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully.',
        ], 200);
    }

    public function setPin(Request $request)
    {
        $pin = $request->input('pin');
        $user = User::find(Auth::user()->id);
        $user->pin = $pin;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Pin set successfully.'
        ], 200);
    }

    public function verifyPin(Request $request)
    {
        $pin = $request->input('pin');
        $user = User::find(Auth::user()->id);

        if ($user->pin == $pin) {
            // Set a cookie to indicate PIN is verified
            Cookie::queue('user_pin', true, 60); // Cookie will expire in 60 minutes

            return response()->json([
                'status' => true,
                'message' => 'Pin verified successfully.'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Pin verification failed.'
            ], 401);
        }
    }
}
