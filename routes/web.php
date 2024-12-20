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

Route::get('auth/login', function () {
    return view('auth.login');
})->name('login');

Route::get('auth/register', function () {
    return view('auth.register');
})->name('register');

Route::get('auth/google/callback', [AuthController::class, 'googleCallback'])->name('auth.google.callback');





Route::get('/dashboard', function () {
    $user = Auth::user();
    $showPinModal = request()->get('showPinModal', false);

    return view('dashboard.index', compact('user', 'showPinModal'));
})->middleware('checkPin')->name('dashboard');

Route::get('/account-manager', function () {
    $user = Auth::user();
    $showPinModal = request()->get('showPinModal', false);
    return view('dashboard.accountManager', compact('user', 'showPinModal'));
})->middleware('checkPin')->name('account-manager');
Route::get('/password-generator', function () {
    $user = Auth::user();
    $showPinModal = request()->get('showPinModal', false);
    return view('dashboard.passwordGenerator', compact('user', 'showPinModal'));
})->name('password-generator');
Route::get('/activity', function () {
    $user = Auth::user();
    $showPinModal = request()->get('showPinModal', false);
    return view('dashboard.activity', compact('user', 'showPinModal'));
})->name('activity');
Route::get('/security', function () {
    $user = Auth::user();
    $showPinModal = request()->get('showPinModal', false);
    return view('dashboard.security', compact('user', 'showPinModal'));
})->name('security');
Route::get('/account-manager/{provider}', function ($provider) {
    $user = Auth::user();
    $showPinModal = request()->get('showPinModal', false);

    return view('dashboard.detail-accountManager', compact('user', 'provider', 'showPinModal'));
})->name('account-manager.provider');
