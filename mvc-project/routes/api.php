<?php
// routes/api.php

use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\Api\TransaksiController;


// Protected routes (admin only)
Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    // Admin only
    Route::get('/transaksis', [TransaksiController::class, 'index'])->middleware('role:admin');
    Route::delete('/transaksis/{id}', [TransaksiController::class, 'destroy'])->middleware('role:admin');

    Route::post('/genres', [GenreController::class, 'store']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']);

    Route::post('/authors', [AuthorController::class, 'store']);
    Route::put('/authors/{id}', [AuthorController::class, 'update']);
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    
    // Customer only
    Route::post('/transaksis', [TransaksiController::class, 'store'])->middleware('role:customer');
    Route::put('/transaksis/{id}', [TransaksiController::class, 'update'])->middleware('role:customer');
    Route::get('/transaksis/{id}', [TransaksiController::class, 'show'])->middleware('role:customer');

    Route::apiResource('genres', GenreController::class);
    Route::apiResource('authors', AuthorController::class);

    Route::get('/genres', [GenreController::class, 'index']);
    Route::post('/genres', [GenreController::class, 'store']);

    Route::get('/authors', [AuthorController::class, 'index']);
    Route::post('/authors', [AuthorController::class, 'store']);

    // Public routes (GET only)
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres/{id}', [GenreController::class, 'show']);

    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{id}', [AuthorController::class, 'show']);

});