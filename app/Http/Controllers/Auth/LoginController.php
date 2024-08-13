<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    // */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/admin';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('auth')->only('logout');
    // }
    public function showLoginForm  () {
        if (!Auth::user()) {
            return view('login');
        }
        return redirect()->back();
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            // 'role' => 'required',
        ]);

        // Find the user by email
        $users = User::where('username', $request->username)->first();

        // Check if user exists
        if (!$users) {
            return redirect()->back()->with('error', 'Email tidak terdaftar.');
        }

        // Check if the password is correct
        if (!Hash::check($request->password, $users->password)) {
            return redirect()->back()->with('error', 'Password Salah.');
        }

        // Log the user in
        Auth::login($users);

        // Get the user role
        $role = $users->role;

        // Optionally log user activity
        // AktivitasUser::create([
        //     'id_user' => Auth::id(),
        //     'keterangan' => 'pengguna berhasil masuk'
        // ]);

        // Redirect to the alumni route with the user role
        // return view('admin', compact('role'));
        return redirect()->route('dashboard', compact('role'));
    }

    
    public function logout () 
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
}
