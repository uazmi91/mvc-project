<?php
// routes/api.php

use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\AuthorController;

Route::apiResource('genres', GenreController::class);
Route::apiResource('authors', AuthorController::class);

Route::get('/genres', [GenreController::class, 'index']);
Route::post('/genres', [GenreController::class, 'store']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);