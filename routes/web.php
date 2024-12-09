<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('auth/login',[AuthController::class, 'indexLogin'])->name('login');
Route::get('auth/register',[AuthController::class, 'indexRegister'])->name('register');

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/facebook', [AuthController::class, 'redirectToFacebook'])->name('auth.facebook');



Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::get('/account-manager', function () {
    return view('dashboard.accountManager');
})->name('account-manager');
Route::get('/password-generator', function () {
    return view('dashboard.passwordGenerator');
})->name('password-generator');
Route::get('/activity-log', function () {
    return view('dashboard.activityLog');
})->name('activity-log');    
Route::get('/security', function () {
    return view('dashboard.security');
})->name('security');    
Route::get('/account-manager/{provider}', function () {
    return view('dashboard.detail-accountManager');
})->name('account-manager.provider');
