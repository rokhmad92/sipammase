<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\harmonisasi;
use Illuminate\Http\Request;
use App\Models\padministrasi;

class berandaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $harmonisasi = harmonisasi::all();
        $totalPengajuan = harmonisasi::where('padministrasi_id', 1)->count();
        $totalAdministrasi = harmonisasi::where('padministrasi_id', 2)->count();
        $totalRapat = harmonisasi::where('padministrasi_id', 3)->count();
        $totalPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();
        $agenda = agenda::whereNotNull('foto')->get('foto');
        $agendaCheck = agenda::whereNotNull('foto')->first('foto');
        return view('beranda', [
            'title' => 'Beranda'
        ], compact('totalPengajuan', 'totalAdministrasi', 'totalRapat', 'totalPenyampaian', 'harmonisasi', 'agenda', 'agendaCheck'));
    }

    public function show($get)
    {
        $totalPengajuan = harmonisasi::where('padministrasi_id', 1)->count();
        $totalAdministrasi = harmonisasi::where('padministrasi_id', 2)->count();
        $totalRapat = harmonisasi::where('padministrasi_id', 3)->count();
        $totalPenyampaian = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();
        $agenda = agenda::whereNotNull('foto')->get('foto');
        $agendaCheck = agenda::whereNotNull('foto')->first('foto');

        // get Data
        $administrasi = padministrasi::where('nama', $get)->first('id');
        if ($administrasi->id == 4) {
            $harmonisasi = harmonisasi::where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->get();
        } else {
            $harmonisasi = harmonisasi::where('padministrasi_id', $administrasi->id)->get();
        }

        return view('beranda', [
            'title' => 'Beranda'
        ], compact('totalPengajuan', 'totalAdministrasi', 'totalRapat', 'totalPenyampaian', 'harmonisasi', 'agenda', 'agendaCheck'));
    }
}
