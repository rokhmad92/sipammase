<?php

namespace App\Http\Controllers;

use App\Models\harmonisasi;
use App\Models\kpengajuan;
use App\Models\pemrakarsa;
use App\Models\rancangan;
use Illuminate\Http\Request;

class pengajuanController extends Controller
{
    public function index()
    {
        $rancangan = rancangan::all();
        $harmonisasi = harmonisasi::all();
        return view('pengajuan.pengajuan', [
            'title' => 'Pengajuan Harmonisasi'
        ], compact('rancangan', 'harmonisasi'));
    }

    public function tambah($rancangan)
    {
        $kpengajuan = kpengajuan::all();
        $pemrakarsa = pemrakarsa::all();
        return view('pengajuan.pengajuanTambah', [
            'title' => 'Tambah Pengajuan Harmonisasi',
            'rancangan' => $rancangan
        ], compact('pemrakarsa', 'kpengajuan'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tahun' => 'required',
            'pemrakarsa' => 'required',
            'judul' => 'required|max:50',
            'rancangan' => 'required',
            'permohonan' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable|max:100',
            'docx1' => 'nullable',
            'docx2' => 'nullable',
            'docx3' => 'nullable',
            'docx4' => 'nullable',
            'docx5' => 'nullable',
        ]);
        $data = $request->input();
        $dataFile = $request->file();
        $rancangan_id = rancangan::where('nama', $data['rancangan'])->first();
        // @dd($data);
        harmonisasi::create([
            'tahun_id' => 1,
            'rancangan_id' => $rancangan_id->id,
            'pemrakarsa_id' => $data['pemrakarsa'],
            'kpengajuan_id' => $data['status'],
            'padministrasi_id' => 1,
            'judul' => $data['judul'],
            'tanggal' => $data['permohonan'],
            'keterangan' => $data['keterangan']
        ]);

        return redirect('/pengajuan');
    }
}
