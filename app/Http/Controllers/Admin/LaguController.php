<?php

namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Lagu;    


    class LaguController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $lagu = Lagu::all();

            return view('admin.lagu.index', ['lagu' => $lagu]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
             return view('admin.lagu.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'file' => 'required|file|mimes:mp3,wav|max:10240',
            ]);
            $path = $request->file('file')->store('lagu', 'public');

            $lagu = new Lagu();
            $lagu->nama = $validated['nama'];
            $lagu->genre = $validated['genre'];
            $lagu->file = $path;
            $lagu->save();

            return redirect()->route('lagu.index');
        }
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
