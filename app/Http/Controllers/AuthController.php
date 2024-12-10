<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function indexLogin() {
        return view('auth.login');
    }
    

    public function login(Request $request) { 
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dashboard');
        }
    }
    
    public function indexRegister() {
        return view('auth.register');
    }

    public function register(Request $request) { 
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
            Auth::login($finduser); 
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider_id' => $user->id,
                'password' => encrypt('my-google')
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('dashboard');
    }

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
