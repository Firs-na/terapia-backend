<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lagu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaguController extends Controller
{
    public function index()
    {
        return Lagu::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'file' => 'required|file|mimes:mp3,wav|max:512000', // 512.000 KB = 500 MB
        ]);

        $path = $request->file('file')->store('lagu', 'public');

        $lagu = new Lagu();
        $lagu->nama = $validated['nama'];
        $lagu->genre = $validated['genre'];
        $lagu->file = $path;
        $lagu->save();

        return response()->json($lagu, 201);
    }

    public function destroy(string $id)
    {
        $lagu = Lagu::find($id);

        Storage::disk('public')->delete($lagu->file);

        $lagu->delete();

        return response()->json(['message' => 'Lagu berhasil dihapus']);
    }
}