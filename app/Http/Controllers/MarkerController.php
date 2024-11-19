<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    /**
     * Display a listing of the markers.
     */
    public function index()
    {
        // Ambil semua marker dari database
        $markers = Marker::all();

        // Tampilkan view index dengan data marker
        return view('markers.index', compact('markers'));
    }

    /**
     * Show the form for creating a new marker.
     */
    public function create()
    {
        // Tampilkan form untuk menambah marker baru
        return view('markers.create');
    }

    /**
     * Store a newly created marker in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Simpan data marker baru ke dalam database
        Marker::create($request->only(['name', 'latitude', 'longitude', 'description']));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('markers.index')->with('success', 'Marker added successfully.');
    }

    /**
     * Show the form for editing the specified marker.
     */
    public function edit(Marker $marker)
    {
        // Tampilkan form edit dengan data marker yang dipilih
        return view('markers.edit', compact('marker'));
    }

    /**
     * Update the specified marker in storage.
     */
    public function update(Request $request, Marker $marker)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Update data marker di database
        $marker->update($request->only(['name', 'latitude', 'longitude', 'description']));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('markers.index')->with('success', 'Marker updated successfully.');
    }

    /**
     * Remove the specified marker from storage.
     */
    public function destroy(Marker $marker)
    {
        // Hapus data marker dari database
        $marker->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('markers.index')->with('success', 'Marker deleted successfully.');
    }
}
