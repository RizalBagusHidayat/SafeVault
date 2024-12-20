<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\PlatformController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('auth/google', [AuthController::class, 'googleRedirect'])->name('auth.google');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('setPin', [AuthController::class, 'setPin'])->name('setPin');
// Route::post('verifyPin', [AuthController::class, 'verifyPin'])->name('verifyPin');
Route::post('verifyPin', [AuthController::class, 'verifyPin'])->name('verifyPin');



Route::resource('account', AccountController::class);
Route::resource('platform', PlatformController::class);
Route::get('activity', function () {
    $data = [
        [
            'timestamp' => now()->format('Y-m-d H:i:s'), // Current timestamp
            'user' => 'John Doe',                       // Example user
            'action' => 'Logged in'                     // Example action
        ]
    ];

    return response()->json([
        'status' => true,
        'message' => 'Activity data retrieved successfully',
        'data' => $data
    ], 200);
})->name('api.activity');

Route::get('addCookies', function () {
    // Cookie::make('user_pin', '1234');
    Cookie::queue('user_pin', '1234', 60 * 24); // 60 * 24 = 1 hari
    return 'Cookies added successfully';
})->name('addCookies');
Route::get('removeCookies', function (Request $request) {
    Cookie::queue(Cookie::forget('user_pin'));
    // $request->cookie()->forget('user_pin');
    return 'Cookies removed successfully';
})->name('removeCookies');
