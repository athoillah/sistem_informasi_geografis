<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Menampilkan halaman routing dengan peta.
     */
    public function routing()
    {
        return view('map.routing');
    }
}
