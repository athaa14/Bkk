<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\DataPerusahaan;

class AdminController extends Controller
{
    public function index()
    {
        $totalAlumni = Alumni::count();
        $totalPerusahaan = DataPerusahaan::count();
        // $alumniWorking = Alumni::where('status', 'working')->count(); // Replace 'status' with your actual column name
        // $alumniNotWorking = Alumni::where('status', 'not_working')->count(); // Replace 'status' with your actual column name

        // Pass data to the view
        return view('admin', compact( 'totalAlumni','totalPerusahaan'));
    }

    public function dashboard() // Renamed function
    {
    }
}
