<?php

namespace App\Http\Controllers;

use App\Models\harmonisasi;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index ()
    {
        // pemda
        $pemdaPengajuan = harmonisasi::where('padministrasi_id', 1)->where('rancangan_id', 1)->count();
        $pemdaAdministrasi = harmonisasi::where('padministrasi_id', 2)->where('rancangan_id', 1)->count();
        $pemdaRapat = harmonisasi::where('padministrasi_id', 3)->where('rancangan_id', 1)->count();
        $pemdaPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->where('rancangan_id', 1)->count();

        // dprd
        $dprdPengajuan = harmonisasi::where('padministrasi_id', 1)->where('rancangan_id', 2)->count();
        $dprdAdministrasi = harmonisasi::where('padministrasi_id', 2)->where('rancangan_id', 2)->count();
        $dprdRapat = harmonisasi::where('padministrasi_id', 3)->where('rancangan_id', 2)->count();
        $dprdPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->where('rancangan_id', 2)->count();

        // RPERKADA
        $rperkadaPengajuan = harmonisasi::where('padministrasi_id', 1)->where('rancangan_id', 3)->count();
        $rperkadaAdministrasi = harmonisasi::where('padministrasi_id', 2)->where('rancangan_id', 3)->count();
        $rperkadaRapat = harmonisasi::where('padministrasi_id', 3)->where('rancangan_id', 3)->count();
        $rperkadaPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->where('rancangan_id', 3)->count();
        return view('grafik', [
            'title' => 'Grafik Harmonisasi'
        ], compact('pemdaPengajuan', 'pemdaAdministrasi', 'pemdaRapat', 'pemdaPenyampaian', 'dprdPengajuan', 'dprdAdministrasi', 'dprdRapat', 'dprdPenyampaian', 'rperkadaPengajuan', 'rperkadaAdministrasi', 'rperkadaRapat', 'rperkadaPenyampaian'));
    }
}
