<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\harmonisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class basicController extends Controller
{
    public function index()
    {
        $harmonisasi = harmonisasi::with('padministrasi', 'kpengajuan', 'pemrakarsa')->get();
        $totalPengajuan = harmonisasi::where('padministrasi_id', 1)->count();
        $totalAdministrasi = harmonisasi::where('padministrasi_id', 2)->count();
        $totalRapat = harmonisasi::where('padministrasi_id', 3)->count();
        $totalPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();
        $agenda = agenda::with('pemrakarsa')->latest()->get();
        return view('halamanDepan.landingpage', [
            'title' => 'Selamat Datang Di SIPAMMASE'
        ], compact('totalPengajuan', 'totalAdministrasi', 'totalRapat', 'totalPenyampaian', 'harmonisasi', 'agenda'));
    }

    public function perancang()
    {
        return view('halamanDepan.perancang', [
            'title' => 'Daftar Perancang'
        ]);
    }

    public function login()
    {
        return view('halamanDepan.login', [
            'title' => 'Login'
        ]);
    }

    public function login_post(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validateData)) {
            $request->session()->regenerate();
            return redirect()->intended('beranda');
        }

        return back()->with('failed', 'Username atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
