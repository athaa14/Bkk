<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\AdminAlumni;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{   
    public function index()
    {
        $data_alumni = Alumni::paginate(10); // Menggunakan paginate untuk tabel alumni
        return view('akunalumni', compact('data_alumni')); // Mengarahkan ke view alumni.blade.php
    }
    
    // public function page()
    // {
    //     $adminAlumni = Alumni::paginate(10); // Menggunakan paginate untuk tabel admin alumni
    //     $alumniLogin = Alumni::where('id_user', Auth::id())->first();

    //     return view('alumni', compact('adminAlumni', 'alumniLogin')); // Mengarahkan ke view akunalumni.blade.php

    // }

    public function search(Request $request)
{
    $query = Alumni::query();
    
    if ($request->filled('searchName')) {
        $query->where('nama', 'like', '%' . $request->searchName . '%');
    }
    
    if ($request->filled('searchJurusan')) {
        $query->where('jurusan', $request->searchJurusan);
    }
    
    if ($request->filled('searchTahunLulus')) {
        $query->where('tahun_lulus', $request->searchTahunLulus);
    }
    
    $data_alumni = $query->get();
    
    return view('alumni', ['alumni' => $data_alumni]);
}


    public function edit($id)
    {
        // Retrieve the alumni record by its ID
        $data_alumni = Alumni::findOrFail($id);

        // Pass the alumni record to the edit view
        return view('editalumni', compact('data_alumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_lulus' => 'required|string|max:255',
        ]);

         // Find the alumni by ID and update the details
         $data_alumni = Alumni::findOrFail($id);
         $data_alumni->nis = $request->nis;
         $data_alumni->nama = $request->nama;
         $data_alumni->jurusan = $request->jurusan;
         $data_alumni->tahun_lulus = $request->tahun_lulus;
         $data_alumni->save();

         // Redirect back with a success message
        return redirect('/akunalumni')->with('success', 'Alumni details updated successfully!');
    }

    public function dataloker1()
    {
        return view('dataloker1');
    }

    public function profilealumni()
    {
        $alumniLogin = Alumni::where('id_user', Auth::id())->first();
        // return $alumniLogin->nama;
        return view ('profilealumni', compact('alumniLogin'));
        // return view('profilealumni', compact('alumniLogin')); // Mengarahkan ke view akunalumni.blade.php
        // return view('profilealumni');
    }
    
    public function loker()
    {
        $alumniLogin = Alumni::where('id_user', Auth::id())->first();
        // return $alumniLogin->nama;
        // return request('alumniLogin');  
        return view('loker', compact('alumniLogin'));
        // return view ('loker');
    }

}
