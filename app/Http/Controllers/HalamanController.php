<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class HalamanController extends Controller
{
    public function dashboard() {
        if (Auth::check()) { // Check if the user is authenticated
            $role = Auth::user()->role; // Get the authenticated user's role

            if ($role === 'Admin BKK') {
                return view('admin');
            } else if ($role === 'Perusahaan') {
                $perusahaan = Perusahaan::all();
                return view('perusahaan');
            } else if ($role === 'Alumni') {
                $alumni = Alumni::all();
                $alumniLogin = Alumni::where('username', Auth::nik())->first();
                return view('alumni', compact(['alumni', 'alumniLogin']));
            }
        }
        // return view('login');
        return redirect()->route('login');
    }
}
