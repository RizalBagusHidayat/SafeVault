<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\PlatformController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('auth/google', [AuthController::class, 'googleRedirect'])->name('auth.google');

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
