<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\harmonisasi;
use App\Models\perancang;
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
        $agendaFoto = agenda::whereNotNull('foto')->get('foto');
        $agendaCheck = agenda::whereNotNull('foto')->first('foto');

        return view('halamanDepan.landingpage', [
            'title' => 'Selamat Datang Di SIPAMMASE'
        ], compact('totalPengajuan', 'totalAdministrasi', 'totalRapat', 'totalPenyampaian', 'harmonisasi', 'agenda', 'agendaCheck', 'agendaFoto'));
    }

    public function perancang()
    {
        $perancang = perancang::all();
        return view('halamanDepan.perancang', [
            'title' => 'Daftar Perancang'
        ], compact('perancang'));
    }

    public function login()
    {
        return view('login.login', [
            'title' => 'Login SIPAMMASE'
        ]);
    }

    public function login_post(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|max:20',
            'password' => 'required|max:20'
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
