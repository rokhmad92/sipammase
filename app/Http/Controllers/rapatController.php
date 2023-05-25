<?php

namespace App\Http\Controllers;

use App\Models\doc_rapat;
use App\Models\doc_penyampaian;
use App\Models\harmonisasi;
use Illuminate\Http\Request;
use App\Models\padministrasi;
use Illuminate\Support\Facades\Storage;

class rapatController extends Controller
{
    public function index()
    {
        $harmonisasi = harmonisasi::with('pemrakarsa', 'padministrasi', 'kpengajuan')->where('padministrasi_id', 3)->get();
        return view('rapat.rapat', [
            'title' => 'Rapat Harmonisasi'
        ], compact('harmonisasi'));
    }

    public function show(harmonisasi $harmonisasi)
    {
        $getHarmonisasi = $harmonisasi;
        $rancangan = $harmonisasi->rancangan->nama;
        $status = ['Penyampaian', 'Di Tolak'];
        return view('rapat.rapatEdit', [
            'title' => 'Edit Rapat Harmonisasi'
        ], compact('getHarmonisasi', 'rancangan', 'status'));
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
            if($request->file('docx1') && $harmonisasi->doc_rapat->docx1 != null) {
                Storage::delete($harmonisasi->doc_rapat->docx1);
                $docx1 = $dataFile['docx1']->store('document');
            } elseif ($request->file('docx1')) {
                $docx1 = $dataFile['docx1']->store('document');
            } else {
                $docx1 = $harmonisasi->doc_rapat->docx1;
            }

            if($request->file('docx2')  && $harmonisasi->doc_rapat->docx2 != null) {
                Storage::delete($harmonisasi->doc_rapat->docx2);
                $docx2 = $dataFile['docx2']->store('document');
            } elseif ($request->file('docx2')) {
                $docx2 = $dataFile['docx2']->store('document');
            } else {
                $docx2 = $harmonisasi->doc_rapat->docx2;
            }

            if($request->file('docx3')  && $harmonisasi->doc_rapat->docx3 != null) {
                Storage::delete($harmonisasi->doc_rapat->docx3);
                $docx3 = $dataFile['docx3']->store('document');
            } elseif ($request->file('docx3')) {
                $docx3 = $dataFile['docx3']->store('document');
            } else {
                $docx3 = $harmonisasi->doc_rapat->docx3;
            }

            if($request->file('docx4')  && $harmonisasi->doc_rapat->docx4 != null) {
                Storage::delete($harmonisasi->doc_rapat->docx4);
                $docx4 = $dataFile['docx4']->store('document');
            } elseif ($request->file('docx4')) {
                $docx4 = $dataFile['docx4']->store('document');
            } else {
                $docx4 = $harmonisasi->doc_rapat->docx4;
            }

            if($request->file('docx5')  && $harmonisasi->doc_rapat->docx5 != null) {
                Storage::delete($harmonisasi->doc_rapat->docx5);
                $docx5 = $dataFile['docx5']->store('document');
            } elseif ($request->file('docx5')) {
                $docx5 = $dataFile['docx5']->store('document');
            } else {
                $docx5 = $harmonisasi->doc_rapat->docx5;
            }
        // End check Doc

        doc_rapat::where('harmonisasi_id', $harmonisasi->id)
        ->update([
            'keterangan' => $data['keterangan'],
            'docx1' => $docx1,
            'docx2' => $docx2,
            'docx3' => $docx3,
            'docx4' => $docx4,
            'docx5' => $docx5
        ]);

        if ($data['status'] == 'Penyampaian') {
            $padministrasi_id = padministrasi::where('nama', 'Penyampaian')->first('id');
            $harmonisasi_id = harmonisasi::where('id', $harmonisasi->id)->first();
            $penyampaian_id = doc_penyampaian::create([
                'harmonisasi_id' => $harmonisasi_id->id
            ]);
            harmonisasi::where('judul', $harmonisasi->judul)
            ->update([
                'status_rapat' => $data['status'],
                'padministrasi_id' => $padministrasi_id->id,
                'doc_penyampaian_id' => $penyampaian_id->id,
            ]);
        } else {
            harmonisasi::where('judul', $harmonisasi->judul)
            ->update([
                'status_rapat' => $data['status'],
            ]);
        }

        return redirect('/rapat')->with('success', 'Berhasil Update Data');
    }

    public function destroy1(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->doc_rapat->docx1);
        doc_rapat::where('harmonisasi_id', $harmonisasi->id)->update([
            'docx1' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy2(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->doc_rapat->docx2);
        doc_rapat::where('harmonisasi_id', $harmonisasi->id)->update([
            'docx2' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy3(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->doc_rapat->docx3);
        doc_rapat::where('harmonisasi_id', $harmonisasi->id)->update([
            'docx3' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy4(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->doc_rapat->docx4);
        doc_rapat::where('harmonisasi_id', $harmonisasi->id)->update([
            'docx4' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy5(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->doc_rapat->docx5);
        doc_rapat::where('harmonisasi_id', $harmonisasi->id)->update([
            'docx5' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }
}