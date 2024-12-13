<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function indexLogin()
    {
        // dd(Auth::user());
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }




    public function indexRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $email,
            'password' => Hash::make($password),
            'provider_id' => null,
        ]);

        // Redirect ke halaman login setelah berhasil mendaftar
        return redirect()->route('login')->with('success', 'Registration successful, please log in.');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('email', $user->email)->first();

        if ($finduser) {
            // dd($finduser);
            Auth::login($finduser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider_id' => $user->id,
                'password' => Hash::make('123123')
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('dashboard');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
