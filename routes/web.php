<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('auth/login', [AuthController::class, 'indexLogin'])->name('login');

Route::get('auth/register', [AuthController::class, 'indexRegister'])->name('register');

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [AuthController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [AuthController::class, 'handleFacebookCallback']);

Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/dashboard', function () {

    $user = Auth::user();
    // dd($user);
    return view('dashboard.index', compact('user'));
})->name('dashboard');
Route::get('/account-manager', function () {
    return view('dashboard.accountManager');
})->name('account-manager');
Route::get('/password-generator', function () {
    return view('dashboard.passwordGenerator');
})->name('password-generator');
Route::get('/activity', function () {
    return view('dashboard.activity');
})->name('activity');
Route::get('/security', function () {
    return view('dashboard.security');
})->name('security');
Route::get('/account-manager/{provider}', function () {
    return view('dashboard.detail-accountManager');
})->name('account-manager.provider');
