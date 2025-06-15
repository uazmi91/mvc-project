<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
{
    $transaksi = Transaksi::with(['user', 'product'])->get();
    return response()->json($transaksi);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'jumlah' => 'required|integer',
    ]);

    $transaksi = Transaksi::create([
        'user_id' => auth()->id(),
        'product_id' => $validated['product_id'],
        'jumlah' => $validated['jumlah'],
    ]);

    return response()->json($transaksi, 201);
}

public function show($id)
{
    $transaksi = Transaksi::with(['user', 'product'])->find($id);
    if (!$transaksi) return response()->json(['message' => 'Not Found'], 404);
    return response()->json($transaksi);
}

public function update(Request $request, $id)
{
    $transaksi = Transaksi::find($id);
    if (!$transaksi) return response()->json(['message' => 'Not Found'], 404);

    if ($transaksi->user_id !== auth()->id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $transaksi->update($request->only('jumlah', 'product_id'));
    return response()->json($transaksi);
}

public function destroy($id)
{
    $transaksi = Transaksi::find($id);
    if (!$transaksi) return response()->json(['message' => 'Not Found'], 404);

    $transaksi->delete();
    return response()->json(['message' => 'Deleted']);
}

}
