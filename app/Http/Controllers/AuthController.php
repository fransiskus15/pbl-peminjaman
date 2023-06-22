<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            if (Auth::user()->level === 'admin') {
                return redirect()->intended('/dashboard_admin');
            } elseif (Auth::user()->level === 'mahasiswa') {
                return redirect()->intended('/dashboard_mahasiswa');
            } elseif (Auth::user()->level === 'pic') {
                return view('/dashboard_admin');
            } elseif (Auth::user()->level === 'penanggung_jawab') {
                return view('/dashboard_admin');
            }
        }

        Session::flash('error', 'NIM atau password yang Anda masukkan salah');


        return back()->withErrors([
            'nim' => 'NIM atau password yang Anda masukkan salah',
        ]);
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => ['required', 'string', 'min:8', 'unique:users'],
            'name' => ['required', 'string', 'max:25'],
            // 'level' => ['required', 'string', 'in:admin,mahasiswa'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'nim' => $validatedData['nim'],
            'name' => $validatedData['name'],
            'level' => 'mahasiswa',
            // Set level secara otomatis sebagai 'mahasiswa'
            // 'level' => $validatedData['level'],
            // 'password' => bcrypt($validatedData['password']),
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        Session::flash('success', 'Registrasi berhasil! Anda telah berhasil mendaftar sebagai mahasiswa.');

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    // public function loginAsGuest()
    // {
    //     // Logika untuk login sebagai tamu
    //     // Misalnya, Anda dapat menggunakan Auth::login() untuk masuk sebagai tamu

    //     // Setelah login sebagai tamu, Anda dapat mengarahkan pengguna ke halaman yang sesuai
    //     return redirect('/dashboard');
    // }



    public function adminDashboard()
    {
        return view('dashboard_admin');
    }

    public function mahasiswaDashboard()
    {
        return view('dashboard_mahasiswa');
    }

    // public function index()
    // {
    //     $peminjaman = \App\Models\Peminjaman::where('id', auth()->user()->id)->get();

    //     return view('peminjaman.dashboard_mahasiswa', compact('peminjaman'));
    // }
}
