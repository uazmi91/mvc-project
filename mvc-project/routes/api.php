<?php
// routes/api.php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::apiResource('books', BookController::class);
Route::apiResource('authors', AuthorController::class);
