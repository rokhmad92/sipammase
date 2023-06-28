<?php

namespace App\Http\Controllers;

use App\Models\tahun;
use App\Models\agenda;
use App\Models\perancang;
use App\Models\rancangan;
use App\Models\pemrakarsa;
use App\Models\harmonisasi;
use Illuminate\Http\Request;
use App\Models\padministrasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class basicController extends Controller
{
    public function index()
    {
        $post_tahun = '';
        $post_harmonisasi = '';
        $post_pemrakarsa = '';
        $rancangan = rancangan::all();
        $tahun = tahun::all();
        $pemrakarsa = pemrakarsa::all();
        $totalPengajuan = harmonisasi::where('padministrasi_id', 1)->count();
        $totalAdministrasi = harmonisasi::where('padministrasi_id', 2)->count();
        $totalRapat = harmonisasi::where('padministrasi_id', 3)->count();
        $totalPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();
        $agenda = agenda::with('pemrakarsa')->latest()->get();
        $agendaFoto = agenda::whereNotNull('foto')->get('foto');
        $agendaCheck = agenda::whereNotNull('foto')->first('foto');
        $kegiatan = agenda::where('aktif', true)->get();
        $kegiatanCheck = agenda::where('aktif', true)->first('id');
        $harmonisasi = harmonisasi::all();

        return view('halamanDepan.landingpage', [
            'title' => 'Selamat Datang Di SIPAMMASE'
        ], compact('totalPengajuan', 'totalAdministrasi', 'totalRapat', 'totalPenyampaian', 'harmonisasi', 'agenda', 'agendaCheck', 'agendaFoto', 'rancangan', 'tahun', 'pemrakarsa', 'post_tahun', 'post_harmonisasi', 'post_pemrakarsa', 'kegiatan', 'kegiatanCheck'));
    }

    public function show($get)
    {
        $post_tahun = '';
        $post_harmonisasi = '';
        $post_pemrakarsa = '';
        $rancangan = rancangan::all();
        $tahun = tahun::all();
        $pemrakarsa = pemrakarsa::all();
        $totalPengajuan = harmonisasi::where('padministrasi_id', 1)->count();
        $totalAdministrasi = harmonisasi::where('padministrasi_id', 2)->count();
        $totalRapat = harmonisasi::where('padministrasi_id', 3)->count();
        $totalPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();
        $agenda = agenda::with('pemrakarsa')->latest()->get();
        $agendaFoto = agenda::whereNotNull('foto')->get('foto');
        $agendaCheck = agenda::whereNotNull('foto')->first('foto');

        // get Data
        $administrasi = padministrasi::where('nama', $get)->first('id');
        if ($administrasi->id == 4) {
            $harmonisasi = harmonisasi::with('padministrasi', 'tahun', 'kpengajuan', 'pemrakarsa')->where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->get();
        } else {
            $harmonisasi = harmonisasi::with('padministrasi', 'tahun', 'kpengajuan', 'pemrakarsa')->where('padministrasi_id', $administrasi->id)->get();
        }

        return view('halamanDepan.landingpage', [
            'title' => 'Selamat Datang Di SIPAMMASE'
        ], compact('totalPengajuan', 'totalAdministrasi', 'totalRapat', 'totalPenyampaian', 'harmonisasi', 'agenda', 'agendaCheck', 'agendaFoto', 'rancangan', 'tahun', 'pemrakarsa', 'post_tahun', 'post_harmonisasi', 'post_pemrakarsa'));
    }

    public function index_filter(Request $request)
    {
        $data = $request->input();
        $post_tahun = $request->input('tahun');
        $post_harmonisasi = $request->input('harmonisasi');
        $post_pemrakarsa = $request->input('pemrakarsa');
        $rancangan = rancangan::all();
        $tahun = tahun::all();
        $pemrakarsa = pemrakarsa::all();
        $totalPengajuan = harmonisasi::where('padministrasi_id', 1)->count();
        $totalAdministrasi = harmonisasi::where('padministrasi_id', 2)->count();
        $totalRapat = harmonisasi::where('padministrasi_id', 3)->count();
        $totalPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();
        $agenda = agenda::with('pemrakarsa')->latest()->get();
        $agendaFoto = agenda::whereNotNull('foto')->get('foto');
        $agendaCheck = agenda::whereNotNull('foto')->first('foto');

        // filter tiga
        if ($data['tahun'] && $data['harmonisasi'] && $data['pemrakarsa']) {
            $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
            $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');
            $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');

            $harmonisasi = harmonisasi::where('rancangan_id', $filter_rancangan->id)->where('tahun_id', $filter_tahun->id)->where('pemrakarsa_id', $filter_pemrakarsa->id)->get();
        }
        // filter dua
        elseif ($data['tahun'] && $data['harmonisasi']) {
            $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
            $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');

            $harmonisasi = harmonisasi::where('rancangan_id', $filter_rancangan->id)->where('tahun_id', $filter_tahun->id)->get();
        }
        elseif ($data['tahun'] && $data['pemrakarsa']) {
            $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
            $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');

            $harmonisasi = harmonisasi::where('pemrakarsa_id', $filter_pemrakarsa->id)->where('tahun_id', $filter_tahun->id)->get();
        }
        elseif ($data['harmonisasi'] && $data['pemrakarsa']) {
            $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');
            $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');

            $harmonisasi = harmonisasi::where('pemrakarsa_id', $filter_pemrakarsa->id)->where('rancangan_id', $filter_rancangan->id)->get();
        }
        // Filter satu
        elseif ($data['tahun']) {
            $filter_tahun = tahun::where('no', $data['tahun'])->first('id');

            $harmonisasi = harmonisasi::where('tahun_id', $filter_tahun->id)->get();
        } 
        elseif ($data['harmonisasi']) {
            $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');

            $harmonisasi = harmonisasi::where('rancangan_id', $filter_rancangan->id)->get();
        } 
        elseif ($data['pemrakarsa']) {
            $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
            
            $harmonisasi = harmonisasi::where('pemrakarsa_id', $filter_pemrakarsa->id)->get();
        }

        return view('halamanDepan.landingpage', [
            'title' => 'Selamat Datang Di SIPAMMASE'
        ], compact('totalPengajuan', 'totalAdministrasi', 'totalRapat', 'totalPenyampaian', 'harmonisasi', 'agenda', 'agendaCheck', 'agendaFoto','rancangan', 'harmonisasi', 'tahun', 'pemrakarsa', 'post_tahun', 'post_harmonisasi', 'post_pemrakarsa'));
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
        return redirect('/login');
    }

    public function masukan (harmonisasi $harmonisasi, Request $request)
    {
        $harmonisasi = $harmonisasi;
        if ($harmonisasi->masukan_masyarakat) {
            abort(403);
        }
        return view('pengajuan.masukanMasyarakat', [
            'title' => 'Masukan Masyarakat'
        ], compact('harmonisasi'));
    }

    public function masukan_store(harmonisasi $harmonisasi, Request $request)
    {
        if ($harmonisasi->masukan_masyarakat) {
            abort(403);
        }
        $request->validate([
            'masukan_masyarakat' => 'required|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'keterangan_masyarakat' => 'required|max:100'
        ]);
        $data = $request->input();
        $dataFile = $request->file();

        // check Doc
            if($request->file('masukan_masyarakat') && $harmonisasi->masukan_masyarakat != null) {
                Storage::delete($harmonisasi->masukan_masyarakat);
                $masukan_masyarakat = $dataFile['masukan_masyarakat']->store('document');
            } elseif ($request->file('masukan_masyarakat')) {
                $masukan_masyarakat = $dataFile['masukan_masyarakat']->store('document');
            } else {
                $masukan_masyarakat = $harmonisasi->masukan_masyarakat;
            }
        // End check Doc

        harmonisasi::where('judul', $harmonisasi->judul)
        ->update([
            'masukan_masyarakat' => $masukan_masyarakat,
            'keterangan_masyarakat' => $data['keterangan_masyarakat']
        ]);
        
        return redirect('/')->with('success', 'Berhasil Input Masukan Masyarakat');
    }
}
