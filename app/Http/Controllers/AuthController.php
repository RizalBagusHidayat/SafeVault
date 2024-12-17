<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully.',
            'redirect' => '/auth/login'
        ], 200);
    }
}
