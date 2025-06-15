<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return response()->json(Genre::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $genre = Genre::create($request->all());
        return response()->json($genre, 201);
    }
}
