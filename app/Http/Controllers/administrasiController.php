<?php

namespace App\Http\Controllers;

use App\Models\doc_administrasi;
use App\Models\rancangan;
use App\Models\harmonisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class administrasiController extends Controller
{
    public function index()
    {
        $harmonisasi = harmonisasi::with('pemrakarsa', 'padministrasi', 'kpengajuan')->where('padministrasi_id', 2)->get();
        return view('administrasi.administrasi', [
            'title' => 'Administrasi Dan Analisis Konsepsi'
        ], compact('harmonisasi'));
    }

    public function show(harmonisasi $harmonisasi)
    {
        $getHarmonisasi = $harmonisasi;
        $rancangan = $harmonisasi->rancangan->nama;
        return view('administrasi.administrasiEdit', [
            'title' => 'Edit Pengajuan Harmonisasi'
        ], compact('getHarmonisasi', 'rancangan'));
    }

    public function update(harmonisasi $harmonisasi, Request $request)
    {
        $request->validate([
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

        // check Doc
            if($request->file('docx1') && $harmonisasi->doc_administrasi->docx1 != null) {
                Storage::delete($harmonisasi->doc_administrasi->docx1);
                $docx1 = $dataFile['docx1']->store('document');
            } elseif ($request->file('docx1')) {
                $docx1 = $dataFile['docx1']->store('document');
            } else {
                $docx1 = $harmonisasi->doc_administrasi->docx1;
            }

            if($request->file('docx2')  && $harmonisasi->doc_administrasi->docx2 != null) {
                Storage::delete($harmonisasi->doc_administrasi->docx2);
                $docx2 = $dataFile['docx2']->store('document');
            } elseif ($request->file('docx2')) {
                $docx2 = $dataFile['docx2']->store('document');
            } else {
                $docx2 = $harmonisasi->doc_administrasi->docx2;
            }

            if($request->file('docx3')  && $harmonisasi->doc_administrasi->docx3 != null) {
                Storage::delete($harmonisasi->doc_administrasi->docx3);
                $docx3 = $dataFile['docx3']->store('document');
            } elseif ($request->file('docx3')) {
                $docx3 = $dataFile['docx3']->store('document');
            } else {
                $docx3 = $harmonisasi->doc_administrasi->docx3;
            }

            if($request->file('docx4')  && $harmonisasi->doc_administrasi->docx4 != null) {
                Storage::delete($harmonisasi->doc_administrasi->docx4);
                $docx4 = $dataFile['docx4']->store('document');
            } elseif ($request->file('docx4')) {
                $docx4 = $dataFile['docx4']->store('document');
            } else {
                $docx4 = $harmonisasi->doc_administrasi->docx4;
            }

            if($request->file('docx5')  && $harmonisasi->doc_administrasi->docx5 != null) {
                Storage::delete($harmonisasi->doc_administrasi->docx5);
                $docx5 = $dataFile['docx5']->store('document');
            } elseif ($request->file('docx5')) {
                $docx5 = $dataFile['docx5']->store('document');
            } else {
                $docx5 = $harmonisasi->doc_administrasi->docx5;
            }
        // End check Doc

        $administrasi_id = doc_administrasi::create([
            'keterangan' => $data['keterangan'],
            'docx1' => $docx1,
            'docx2' => $docx2,
            'docx3' => $docx3,
            'docx4' => $docx4,
            'docx5' => $docx5
        ]);

        harmonisasi::where('judul', $harmonisasi->judul)
        ->update([
            'status_administrasi' => $data['status'],
            'doc_administrasi_id' => $administrasi_id->id
        ]);

        return redirect('/administrasi')->with('success', 'Berhasil Update Data');
    }
}
