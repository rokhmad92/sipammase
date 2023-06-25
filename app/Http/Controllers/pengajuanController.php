<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\tahun;
use App\Models\doc_rapat;
use App\Models\rancangan;
use App\Models\kpengajuan;
use App\Models\pemrakarsa;
use App\Models\harmonisasi;
use Illuminate\Http\Request;
use App\Models\padministrasi;
use App\Models\doc_penyampaian;
use App\Models\doc_administrasi;
use Illuminate\Support\Facades\Storage;

class pengajuanController extends Controller
{
    public function index()
    {
        $post_tahun = '';
        $post_harmonisasi = '';
        $post_pemrakarsa = '';
        $rancangan = rancangan::all();
        $tahun = tahun::all();
        $pemrakarsa = pemrakarsa::all();
        $checkUser = auth()->user()->pemrakarsa_id;

        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $harmonisasi = harmonisasi::where('padministrasi_id', 1)->get();
        } else {
            $harmonisasi = harmonisasi::where('pemrakarsa_id', $checkUser)->get();
        }

        return view('pengajuan.pengajuan', [
            'title' => 'Pengajuan Harmonisasi'
        ], compact('rancangan', 'harmonisasi', 'tahun', 'pemrakarsa', 'post_tahun', 'post_harmonisasi', 'post_pemrakarsa'));
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
        $checkUser = auth()->user()->pemrakarsa_id;

        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            // filter tiga
            if ($data['tahun'] && $data['harmonisasi'] && $data['pemrakarsa']) {
                $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
                $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');
                $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
    
                $harmonisasi = harmonisasi::where('padministrasi_id', 1)->where('rancangan_id', $filter_rancangan->id)->where('tahun_id', $filter_tahun->id)->where('pemrakarsa_id', $filter_pemrakarsa->id)->get();
            }
            // filter dua
            elseif ($data['tahun'] && $data['harmonisasi']) {
                $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
                $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');
    
                $harmonisasi = harmonisasi::where('padministrasi_id', 1)->where('rancangan_id', $filter_rancangan->id)->where('tahun_id', $filter_tahun->id)->get();
            }
            elseif ($data['tahun'] && $data['pemrakarsa']) {
                $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
                $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
    
                $harmonisasi = harmonisasi::where('padministrasi_id', 1)->where('pemrakarsa_id', $filter_pemrakarsa->id)->where('tahun_id', $filter_tahun->id)->get();
            }
            elseif ($data['harmonisasi'] && $data['pemrakarsa']) {
                $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');
                $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
    
                $harmonisasi = harmonisasi::where('padministrasi_id', 1)->where('pemrakarsa_id', $filter_pemrakarsa->id)->where('rancangan_id', $filter_rancangan->id)->get();
            }
            // Filter satu
            elseif ($data['tahun']) {
                $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
    
                $harmonisasi = harmonisasi::where('padministrasi_id', 1)->where('tahun_id', $filter_tahun->id)->get();
            } 
            elseif ($data['harmonisasi']) {
                $filter_rancangan = rancangan::where('nama', $data['harmonisasi'])->first('id');
    
                $harmonisasi = harmonisasi::where('padministrasi_id', 1)->where('rancangan_id', $filter_rancangan->id)->get();
            } 
            elseif ($data['pemrakarsa']) {
                $filter_pemrakarsa = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
                
                $harmonisasi = harmonisasi::where('padministrasi_id', 1)->where('pemrakarsa_id', $filter_pemrakarsa->id)->get();
            }
        } else {
            // Filter satu
            if ($data['tahun']) {
                $filter_tahun = tahun::where('no', $data['tahun'])->first('id');
    
                $harmonisasi = harmonisasi::where('pemrakarsa_id', $checkUser)->where('tahun_id', $filter_tahun->id)->get();
            }
        }

        return view('pengajuan.pengajuan', [
            'title' => 'Pengajuan Harmonisasi'
        ], compact('rancangan', 'harmonisasi', 'tahun', 'pemrakarsa', 'post_tahun', 'post_harmonisasi', 'post_pemrakarsa'));
    }

    public function tambah($rancangan)
    {
        $kpengajuan = kpengajuan::all();
        $checkUser = auth()->user()->pemrakarsa_id;

        if (auth()->user()->role_id == 3) {
            $pemrakarsa = pemrakarsa::where('id', $checkUser)->get();
        } elseif(auth()->user()->role_id == 4) {
            $pemrakarsa = pemrakarsa::where('id', $checkUser)->get();
        } else {
            $pemrakarsa = pemrakarsa::all();
        }
        
        return view('pengajuan.pengajuanTambah', [
            'title' => 'Tambah Pengajuan Harmonisasi',
            'rancangan' => $rancangan
        ], compact('pemrakarsa', 'kpengajuan'));
    }

    public function store(Request $request)
    {
        $harmonisasi = $request->input('rancangan');
        if ($harmonisasi == 'RPERDA DPRD') {

        } elseif ($harmonisasi == 'RPERDA PEMDA') {
            $request->validate([
                'tahun' => 'required|exists:tahun,no',
                'pemrakarsa' => 'required|exists:pemrakarsa,nama',
                'judul' => 'required|unique:harmonisasi,judul',
                'rancangan' => 'required',  
                'permohonan' => 'required',
                'status' => 'required|exists:kpengajuan,nama',
                'keterangan' => 'nullable',
                'docx1' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
                'docx2' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
                'docx3' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
                'docx4' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
                'docx5' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            ]);
        } elseif ($harmonisasi == 'RPERKADA') {

        }
        $data = $request->input();
        $dataFile = $request->file();
        $rancangan_id = rancangan::where('nama', $data['rancangan'])->first();
        $tahun_id = tahun::where('no', $data['tahun'])->first('id');
        $pemrakarsa_id = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
        $kpengajuan_id = kpengajuan::where('nama', $data['status'])->first('id');

        ($request->file('docx1')) ? $docx1 = $dataFile['docx1']->store('document') : $docx1 = '';
        ($request->file('docx2')) ? $docx2 = $dataFile['docx2']->store('document') : $docx2 = '';
        ($request->file('docx3')) ? $docx3 = $dataFile['docx3']->store('document') : $docx3 = '';
        ($request->file('docx4')) ? $docx4 = $dataFile['docx4']->store('document') : $docx4 = '';
        ($request->file('docx5')) ? $docx5 = $dataFile['docx5']->store('document') : $docx5 = '';

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

        return redirect('/pengajuan')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit(Harmonisasi $harmonisasi)
    {
        $posisi = ['Pengajuan', 'Administrasi Dan Analisis Konsep'];
        $getHarmonisasi = $harmonisasi;
        $kpengajuan = kpengajuan::all();
        $pemrakarsa = pemrakarsa::all();
        $users = User::where('role_id', 2)->get();
        $rancangan = $harmonisasi->rancangan->nama;
        return view('pengajuan.pengajuanEdit', [
            'title' => 'Edit Pengajuan Harmonisasi'
        ], compact('getHarmonisasi', 'kpengajuan', 'pemrakarsa', 'rancangan', 'posisi', 'users'));
    }

    public function update(Harmonisasi $harmonisasi, Request $request)
    {
        $request->validate([
            'tahun' => 'required|exists:tahun,no',
            'pemrakarsa' => 'required|exists:pemrakarsa,nama',
            'judul' => 'required',
            'rancangan' => 'required',  
            'permohonan' => 'required',
            'padministrasi' => 'required|exists:padministrasi,nama',
            'proses' => 'nullable|exists:user,namaPanjang',
            'status' => 'required|exists:kpengajuan,nama',
            'keterangan' => 'nullable',
            'docx1' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx2' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx3' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx4' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
            'docx5' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,csv|max:5000|file',
        ]);

        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $data = $request->input();
            $dataFile = $request->file();
            $rancangan_id = rancangan::where('nama', $data['rancangan'])->first();
            $tahun_id = tahun::where('no', $data['tahun'])->first('id');
            $pemrakarsa_id = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
            $kpengajuan_id = kpengajuan::where('nama', $data['status'])->first('id');
            $padministrasi_id = padministrasi::where('nama', $data['padministrasi'])->first('id');
            $proses = User::where('namaPanjang', $data['proses'])->first('id');
            if ($data['proses']) {
                $proses_id = $proses->id;
            } else {
                $proses_id = null;
            }

            // check Doc
                if($request->file('docx1') && $harmonisasi->docx1 != null) {
                    Storage::delete($harmonisasi->docx1);
                    $docx1 = $dataFile['docx1']->store('document');
                } elseif ($request->file('docx1')) {
                    $docx1 = $dataFile['docx1']->store('document');
                } else {
                    $docx1 = $harmonisasi->docx1;
                }

                if($request->file('docx2')  && $harmonisasi->docx2 != null) {
                    Storage::delete($harmonisasi->docx2);
                    $docx2 = $dataFile['docx2']->store('document');
                } elseif ($request->file('docx2')) {
                    $docx2 = $dataFile['docx2']->store('document');
                } else {
                    $docx2 = $harmonisasi->docx2;
                }

                if($request->file('docx3')  && $harmonisasi->docx3 != null) {
                    Storage::delete($harmonisasi->docx3);
                    $docx3 = $dataFile['docx3']->store('document');
                } elseif ($request->file('docx3')) {
                    $docx3 = $dataFile['docx3']->store('document');
                } else {
                    $docx3 = $harmonisasi->docx3;
                }

                if($request->file('docx4')  && $harmonisasi->docx4 != null) {
                    Storage::delete($harmonisasi->docx4);
                    $docx4 = $dataFile['docx4']->store('document');
                } elseif ($request->file('docx4')) {
                    $docx4 = $dataFile['docx4']->store('document');
                } else {
                    $docx4 = $harmonisasi->docx4;
                }

                if($request->file('docx5')  && $harmonisasi->docx5 != null) {
                    Storage::delete($harmonisasi->docx5);
                    $docx5 = $dataFile['docx5']->store('document');
                } elseif ($request->file('docx5')) {
                    $docx5 = $dataFile['docx5']->store('document');
                } else {
                    $docx5 = $harmonisasi->docx5;
                }
            // End check Doc

            if($data['padministrasi'] == 'Administrasi Dan Analisis Konsep' && $harmonisasi->doc_administrasi_id == null)
            {
                $harmonisasi_id = harmonisasi::where('id', $harmonisasi->id)->first();
                $administrasi_id = doc_administrasi::create([
                    'harmonisasi_id' => $harmonisasi_id->id
                ]);

                harmonisasi::where('judul', $harmonisasi->judul)
                ->update([
                    'tahun_id' => $tahun_id->id,
                    'rancangan_id' => $rancangan_id->id,
                    'pemrakarsa_id' => $pemrakarsa_id->id,
                    'kpengajuan_id' => $kpengajuan_id->id,
                    'padministrasi_id' => $padministrasi_id->id,
                    'doc_administrasi_id' => $administrasi_id->id,
                    'user_id' => $proses_id,
                    'judul' => $data['judul'],
                    'tanggal' => $data['permohonan'],
                    'keterangan' => $data['keterangan'],
                    'docx1' => $docx1,
                    'docx2' => $docx2,
                    'docx3' => $docx3,
                    'docx4' => $docx4,
                    'docx5' => $docx5
                ]);
            } else {
                harmonisasi::where('judul', $harmonisasi->judul)
                ->update([
                    'tahun_id' => $tahun_id->id,
                    'rancangan_id' => $rancangan_id->id,
                    'pemrakarsa_id' => $pemrakarsa_id->id,
                    'kpengajuan_id' => $kpengajuan_id->id,
                    'padministrasi_id' => $padministrasi_id->id,
                    'user_id' => $proses_id,
                    'judul' => $data['judul'],
                    'tanggal' => $data['permohonan'],
                    'keterangan' => $data['keterangan'],
                    'docx1' => $docx1,
                    'docx2' => $docx2,
                    'docx3' => $docx3,
                    'docx4' => $docx4,
                    'docx5' => $docx5
                ]);
            }
        } else {
            $data = $request->input();
            $dataFile = $request->file();
            $rancangan_id = rancangan::where('nama', $data['rancangan'])->first();
            $tahun_id = tahun::where('no', $data['tahun'])->first('id');
            $pemrakarsa_id = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
            $kpengajuan_id = kpengajuan::where('nama', $data['status'])->first('id');

            // check Doc
                if($request->file('docx1') && $harmonisasi->docx1 != null) {
                    Storage::delete($harmonisasi->docx1);
                    $docx1 = $dataFile['docx1']->store('document');
                } elseif ($request->file('docx1')) {
                    $docx1 = $dataFile['docx1']->store('document');
                } else {
                    $docx1 = $harmonisasi->docx1;
                }

                if($request->file('docx2')  && $harmonisasi->docx2 != null) {
                    Storage::delete($harmonisasi->docx2);
                    $docx2 = $dataFile['docx2']->store('document');
                } elseif ($request->file('docx2')) {
                    $docx2 = $dataFile['docx2']->store('document');
                } else {
                    $docx2 = $harmonisasi->docx2;
                }

                if($request->file('docx3')  && $harmonisasi->docx3 != null) {
                    Storage::delete($harmonisasi->docx3);
                    $docx3 = $dataFile['docx3']->store('document');
                } elseif ($request->file('docx3')) {
                    $docx3 = $dataFile['docx3']->store('document');
                } else {
                    $docx3 = $harmonisasi->docx3;
                }

                if($request->file('docx4')  && $harmonisasi->docx4 != null) {
                    Storage::delete($harmonisasi->docx4);
                    $docx4 = $dataFile['docx4']->store('document');
                } elseif ($request->file('docx4')) {
                    $docx4 = $dataFile['docx4']->store('document');
                } else {
                    $docx4 = $harmonisasi->docx4;
                }

                if($request->file('docx5')  && $harmonisasi->docx5 != null) {
                    Storage::delete($harmonisasi->docx5);
                    $docx5 = $dataFile['docx5']->store('document');
                } elseif ($request->file('docx5')) {
                    $docx5 = $dataFile['docx5']->store('document');
                } else {
                    $docx5 = $harmonisasi->docx5;
                }
            // End check Doc

            harmonisasi::where('judul', $harmonisasi->judul)
            ->update([
                'tahun_id' => $tahun_id->id,
                'rancangan_id' => $rancangan_id->id,
                'pemrakarsa_id' => $pemrakarsa_id->id,
                'kpengajuan_id' => $kpengajuan_id->id,
                'judul' => $data['judul'],
                'tanggal' => $data['permohonan'],
                'keterangan' => $data['keterangan'],
                'docx1' => $docx1,
                'docx2' => $docx2,
                'docx3' => $docx3,
                'docx4' => $docx4,
                'docx5' => $docx5
            ]);
        }

        return redirect('/pengajuan')->with('success', 'Berhasil Update Data');
    }

    public function destroy(Harmonisasi $harmonisasi)
    {
        // hapus doc harmonisasi
            Storage::delete($harmonisasi->docx1);
            Storage::delete($harmonisasi->docx2);
            Storage::delete($harmonisasi->docx3);
            Storage::delete($harmonisasi->docx4);
            Storage::delete($harmonisasi->docx5);
        // hapus doc administrasi
        if ($harmonisasi->doc_administrasi) {
            if ($harmonisasi->doc_administrasi->docx1) {
                Storage::delete($harmonisasi->doc_administrasi->docx1);
            }
            if ($harmonisasi->doc_administrasi->docx2) {
                Storage::delete($harmonisasi->doc_administrasi->docx2);
            }
            if ($harmonisasi->doc_administrasi->docx3) {
                Storage::delete($harmonisasi->doc_administrasi->docx3);
            }
            if ($harmonisasi->doc_administrasi->docx4) {
                Storage::delete($harmonisasi->doc_administrasi->docx4);
            }
            if ($harmonisasi->doc_administrasi->docx5) {
                Storage::delete($harmonisasi->doc_administrasi->docx5);
            }
        }
        // hapus doc rapat
        if ($harmonisasi->doc_rapat) {
            if ($harmonisasi->doc_rapat->docx1) {
                Storage::delete($harmonisasi->doc_rapat->docx1);
            }
            if ($harmonisasi->doc_rapat->docx2) {
                Storage::delete($harmonisasi->doc_rapat->docx2);
            }
            if ($harmonisasi->doc_rapat->docx3) {
                Storage::delete($harmonisasi->doc_rapat->docx3);
            }
            if ($harmonisasi->doc_rapat->docx4) {
                Storage::delete($harmonisasi->doc_rapat->docx4);
            }
            if ($harmonisasi->doc_rapat->docx5) {
                Storage::delete($harmonisasi->doc_rapat->docx5);
            }
        }
        // hapus doc penyampaian
        if ($harmonisasi->doc_penyampaian) {
            # code...
            if ($harmonisasi->doc_penyampaian->docx1) {
                Storage::delete($harmonisasi->doc_penyampaian->docx1);
            }
            if ($harmonisasi->doc_penyampaian->docx2) {
                Storage::delete($harmonisasi->doc_penyampaian->docx2);
            }
            if ($harmonisasi->doc_penyampaian->docx3) {
                Storage::delete($harmonisasi->doc_penyampaian->docx3);
            }
            if ($harmonisasi->doc_penyampaian->docx4) {
                Storage::delete($harmonisasi->doc_penyampaian->docx4);
            }
            if ($harmonisasi->doc_penyampaian->docx5) {
                Storage::delete($harmonisasi->doc_penyampaian->docx5);
            }
        }
        // hapus data
            harmonisasi::where('judul', $harmonisasi->judul)->delete();
            doc_administrasi::where('harmonisasi_id', $harmonisasi->id)->delete();
            doc_rapat::where('harmonisasi_id', $harmonisasi->id)->delete();
            doc_penyampaian::where('harmonisasi_id', $harmonisasi->id)->delete();
        return back()->with('success', 'Berhasil Menghapus Data');
    }

    public function destroy1(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->docx1);
        harmonisasi::where('judul', $harmonisasi->judul)->update([
            'docx1' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy2(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->docx2);
        harmonisasi::where('judul', $harmonisasi->judul)->update([
            'docx2' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy3(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->docx3);
        harmonisasi::where('judul', $harmonisasi->judul)->update([
            'docx3' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy4(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->docx4);
        harmonisasi::where('judul', $harmonisasi->judul)->update([
            'docx4' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }

    public function destroy5(Harmonisasi $harmonisasi)
    {
        Storage::delete($harmonisasi->docx5);
        harmonisasi::where('judul', $harmonisasi->judul)->update([
            'docx5' => ''
        ]);
        return back()->with('success', 'Berhasil Menghapus Dokumen');
    }
}
