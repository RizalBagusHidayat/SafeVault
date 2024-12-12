<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');


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
