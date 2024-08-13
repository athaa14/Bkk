<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\User;
// use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

// use Symfony\Contracts\Service\Attribute\Required;

class PerusahaanController extends Controller
{
    public function index()
    {
        $data_perusahaan = Perusahaan::all();
        return view('akunperusahaan', compact('data_perusahaan'));
    }

    public function edit($id)
    {
        $data_perusahaan = Perusahaan::findOrFail($id);
        return view('editperusahaan', compact('data_perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $data_perusahaan = Perusahaan::findOrFail($id);
        $data_perusahaan->nama = $request->nama;
        $data_perusahaan->bidang_usaha = $request->bidang_usaha;
        $data_perusahaan->no_telepon = $request->no_telepon;
        $data_perusahaan->alamat = $request->alamat;
        $data_perusahaan->save();


        return redirect('/akunperusahaan')->with('succes','Perusahaan details update successfully!');
    }

    //create akun perusahaan
    public function create()
    {
        return view('tambahakunperusahaan');    
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string',
            // 'nama' => 'required|string',
            // 'bidang_usaha' => 'required|string',
            // 'no_telepon' => 'required|string',
            // 'alamat' => 'required|string',
        ]);

        $pengguna = Users::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'Perusahaan',
        ]); 

        Perusahaan::create([
            'id_user' => $pengguna->id,
            'nama' => $request->input('nama'),
            'bidang_usaha' => $request->input('bidang_usaha'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
        ]);

        // Perusahaan::create($validated);
        return redirect('/akunperusahaan')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        User::where('id', $perusahaan->id_user)->delete();
        $perusahaan->delete();

        return redirect()->route('akunperusahaan')->with('success','Data berhasil dihapus');
    }

    public function dataloker() 
    {
        return view('dataloker');
    }

    public function datalamaran()
    {
        return view('datalamaran');
    }
}
