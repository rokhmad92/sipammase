<?php

namespace App\Http\Controllers;

use App\Models\tahun;
use App\Models\rancangan;
use App\Models\kpengajuan;
use App\Models\pemrakarsa;
use App\Models\harmonisasi;
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
        $request->validate([
            'tahun' => 'required',
            'pemrakarsa' => 'required',
            'judul' => 'required|max:50|unique:harmonisasi,judul',
            'rancangan' => 'required',  
            'permohonan' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable|max:100',
            'docx1' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx2' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx3' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx4' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx5' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
        ]);
        $data = $request->input();
        $dataFile = $request->file();
        $rancangan_id = rancangan::where('nama', $data['rancangan'])->first();
        $tahun_id = tahun::where('no', $data['tahun'])->first('id');
        $pemrakarsa_id = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
        $kpengajuan_id = kpengajuan::where('nama', $data['status'])->first('id');

        // check file
        $docx1 = $request->file('docx1')->store('document');
        $docx2 = $request->file('docx2')->store('document');
        $docx3 = $request->file('docx3')->store('document');
        $docx4 = $request->file('docx4')->store('document');
        $docx5 = $request->file('docx5')->store('document');

        harmonisasi::create([
            'tahun_id' => $tahun_id->id,
            'rancangan_id' => $rancangan_id->id,
            'pemrakarsa_id' => $pemrakarsa_id->id,
            'kpengajuan_id' => $kpengajuan_id->id,
            'padministrasi_id' => 1,
            'judul' => $data['judul'],
            'tanggal' => $data['permohonan'],
            'keterangan' => $data['keterangan'],
            'docx1' => $docx1,
            'docx2' => $docx2,
            'docx3' => $docx3,
            'docx4' => $docx4,
            'docx5' => $docx5
        ]);

        return redirect('/pengajuan');
    }

    public function edit(Harmonisasi $harmonisasi)
    {
        $getHarmonisasi = $harmonisasi;
        $kpengajuan = kpengajuan::all();
        $pemrakarsa = pemrakarsa::all();
        $rancangan = $harmonisasi->rancangan->nama;
        return view('pengajuan.pengajuanEdit', [
            'title' => 'Edit Pengajuan Harmonisasi'
        ], compact('getHarmonisasi', 'kpengajuan', 'pemrakarsa', 'rancangan'));
    }

    public function update(Request $request)
    {

    }

    public function destroy($judul)
    {

    }
}
