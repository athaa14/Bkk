<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        $alumni = Alumni::select(
            DB::raw('count(*) as total'),
            DB::raw('SUM(CASE WHEN status = "bekerja" THEN 1 ELSE 0 END) as bekerja'),
            DB::raw('SUM(CASE WHEN status = "tidak bekerja" THEN 1 ELSE 0 END) as tidak_bekerja')
        )->first();

        $alumniByCompany = Alumni::select(
            'data_perusahaan.nama as perusahaan',
            DB::raw('count(*) as total')
        )
        ->join('data_perusahaan', 'alumni.id_data_perusahaan', '=', 'data_perusahaan.id_data_perusahaan')
        ->where('alumni.status', 'bekerja')
        ->groupBy('data_perusahaan.nama')
        ->get();

        return view('admin', compact('alumniStatus', 'alumniByCompany'));
    }

}

