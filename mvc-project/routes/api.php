<?php
// routes/api.php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::apiResource('books', BookController::class);
Route::apiResource('authors', AuthorController::class);

Route::get('/genres', [GenreController::class, 'index']);
Route::post('/genres', [GenreController::class, 'store']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);