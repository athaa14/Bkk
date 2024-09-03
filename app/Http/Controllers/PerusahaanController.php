<?php

namespace App\Http\Controllers;

use App\Models\DataPerusahaan;
use App\Models\Loker;
use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\User;
// use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

// use Symfony\Contracts\Service\Attribute\Required;

class PerusahaanController extends Controller
{
    public function index(string $id_perusahaan)
    {
        // Fetch the company along with its job vacancies
        $perusahaan = DataPerusahaan::with('loker')->findOrFail($id_perusahaan);
        
        // Pass the company's job vacancies to the view
        $lowongan = $perusahaan->loker;

        return view('dataloker1', compact('lowongan'));
    }

    public function akun_perusahaan()
    {
        $users = Users::where('role', 'Perusahaan')->paginate(5);
        return view('admin.tampil_akun_perusahaan', compact('users'));
    }
       
    public function loker()
    {
        return $this->hasMany(LowonganPekerjaan::class, 'id_data_perusahaan', 'id_data_perusahaan');
    }
     

    public function edit($id_perusahaan)
    {
        $data_perusahaan = DataPerusahaan::findOrFail($id_perusahaan);
        return view('editperusahaan', compact('data_perusahaan'));
    }

    public function update(Request $request, $id_perusahaan)
{
    // Check if the request has 'status'
    if ($request->has('status')) {
        $perusahaan = Perusahaan::findOrFail($id_perusahaan);
        $perusahaan->update(['status' => $request->input('status')]);
        return redirect()->back()->with(['toast' => 'true', 'status' => 'success', 'message' => 'Berhasil Mengubah Status']);
    }

    // Validate the request input
    $request->validate([
        'nama_perusahaan' => 'required|string|max:255',
        'bidang_usaha' => 'required|string|max:255',
        'no_telepon' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
    ]);

    // Find the perusahaan and update its details
    $data_perusahaan = Perusahaan::findOrFail($id_perusahaan);
    $data_perusahaan->nama_perusahaan = $request->input('nama_perusahaan');
    $data_perusahaan->bidang_usaha = $request->input('bidang_usaha');
    $data_perusahaan->no_telepon = $request->input('no_telepon');
    $data_perusahaan->alamat = $request->input('alamat');
    $data_perusahaan->save();

    // Redirect with a success message
    return redirect('/DashboardPerusahaan')->with('success', 'Perusahaan details updated successfully!');
}

    //create akun perusahaan
    public function create()
    {
        return view('tambahakunperusahaan');    
    }

    public function store(Request $request)
    {
        // Validasi data
        // $request->validate([
        //     'jabatan' => 'required|string|max:255',
        //     'jenis_waktu_pekerjaan' => 'required|string|max:255',
        //     'tanggal_akhir' => 'required|date',
        //     'deskripsi' => 'required|string',
        //     'username' => 'required|string|max:255',
        //     'password' => 'required|string|min:8',
        //     'nama' => 'required|string|max:255',
        //     'bidang_usaha' => 'required|string|max:255',
        //     'no_telepon' => 'required|string|max:15',
        //     'alamat' => 'required|string|max:255',
        // ]);

        // $pengguna = Users::create([
        //     'username' => $request->input('username'),
        //     'password' => Hash::make($request->input('password')),
        //     'role' => 'Perusahaan',
        // ]);

       
        
        // return redirect()->route('akunperusahaan')->with('success', 'Lowongan pekerjaan berhasil ditambah');
        // return $request;
    
        // Proses pembuatan akun pengguna perusahaan
           $pengguna = Users::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => 'Perusahaan',
        ]);
    
        // Simpan data perusahaan
            Perusahaan::create([
            'id_perusahaan' => $pengguna->id_perusahaan,
            'username' => $pengguna->username,
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'bidang_usaha' => $request->input('bidang_usaha'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
        ]);
    
        // Simpan data lowongan pekerjaan
        // LowonganPekerjaan::create([
        //     'id_data_perusahaan' => $perusahaan->id_data_perusahaan,
        //     'jabatan' => $request->input('jabatan'),
        //     'jenis_waktu_pekerjaan' => $request->input('jenis_waktu_pekerjaan'),
        //     'tanggal_akhir' => $request->input('tanggal_akhir'),
        //     'deskripsi' => $request->input('deskripsi'),
        //     'status' => 'tertunda', // atau sesuaikan dengan status yang diinginkan
        // ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('perusahaan')->with('success', 'Data Berhasil Ditambahkan');
    }
    
    public function destroy($username)
    {
        // return request();
        $data_perusahaan = Perusahaan::find($username);
        // User::where('username', $data_perus  ahaan->username)->delete();
        $data_perusahaan = Perusahaan::where('username', $username)->first();
        $data_perusahaan->delete();

        return redirect()->route('perusahaan')->with('success','Data berhasil dihapus');
    }

    public function tambahloker(Request $request)
    {
        // Mencari data perusahaan berdasarkan username
        $perusahaan = DataPerusahaan::where('username', $request->input('username'))->first();

        // Jika perusahaan tidak ditemukan, tambahkan validasi atau handling error di sini
        if (!$perusahaan) {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan');
        }

        // Membuat data loker baru
        LowonganPekerjaan::create([
            'id_perusahaan' => $perusahaan->id_data_perusahaan,
            'jabatan' => $request->jabatan_pekerjaan,
            'jenis_waktu_pekerjaan' => $request->jenis_waktu_pekerjaan,
            'deskripsi' => $request->deskripsi,
            'tanggal_akhir' => $request->tanggal_akhir,
            'status' => 'Tertunda'
        ]);

        return redirect()->route('dataloker1')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function dataloker1() 
    {
        $perusahaan = DataPerusahaan::all();
        
        // Pass the company's job vacancies to the view
        // $lowongan = $perusahaan->loker;

        return view('dataloker1', compact('perusahaan'));
    }


    public function datalamaran()
    {
        return view('datalamaran');
    }

    public function perusahaan()
    {
        $perusahaan = Perusahaan::all();
        return view('/perusahaan', compact('perusahaan'));
    }

    public function akunpengguna()
    {
        $akunpengguna = Users::all();
        return view('/akunpengguna', compact('akunpengguna'));
    }

    public function datalokermasuk()
    {
        $datalokermasuk = LowonganPekerjaan::all();
        return view('/datalokermasuk');
    }

    public function profilePerusahaan()
    {
        $perusahaanLogin = DataPerusahaan::where('username', Auth::id())->first();
        return view('/profilePerusahaan');
    }
}
