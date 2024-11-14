<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function index()
    {
        $markers = Marker::all();
        return view('markers.index', compact('markers'));
    }

    public function create()
    {
        return view('markers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Marker::create($request->all());

        return redirect()->route('markers.index')->with('success', 'Marker added successfully.');
    }
}
