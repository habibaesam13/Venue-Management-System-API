<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VenuesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes (Authentication)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes (Requires authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/venues', [VenuesController::class, 'index']); // List all venues
    Route::post('/venues', [VenuesController::class, 'store']); // Add a new venue
    Route::get('/venues/{id}', [VenuesController::class, 'show']); // Get a single venue
    Route::put('/venues/{id}', [VenuesController::class, 'update']); // Update a venue
    Route::delete('/venues/{id}', [VenuesController::class, 'destroy']); // Delete a venue

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
