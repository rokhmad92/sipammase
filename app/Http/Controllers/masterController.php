<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\tahun;
use App\Models\rancangan;
use App\Models\kpengajuan;
use App\Models\padministrasi;
use App\Models\pemrakarsa;
use Illuminate\Http\Request;

class masterController extends Controller
{
    public function role()
    {
        $role = role::all();
        return view('masterData.role', [
            'title' => 'Role',
        ], compact('role'));
    }

    public function role_store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:20'
        ]);

        role::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function role_update($id, Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:20'
        ]);

        role::where('id', $id)
                ->update($validateData);
        return back()->with('success', 'Berhasil Update Data');
    }

    public function tahun()
    {
        $tahun = tahun::all();
        return view('masterData.tahun', [
            'title' => 'Tahun',
        ], compact('tahun'));
    }

    public function tahun_store(Request $request)
    {
        $validateData = $request->validate([
            'no' => 'required|numeric'
        ]);

        tahun::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function tahun_update($id, Request $request)
    {
        $validateData = $request->validate([
            'no' => 'required|numeric'
        ]);

        tahun::where('id', $id)
                ->update($validateData);
        return back()->with('success', 'Berhasil Update Data');
    }

    public function tahun_destroy($id)
    {
        tahun::where('id', $id)->delete();

        return back()->with('success', 'Berhasil Hapus Data');
    }

    public function rancangan()
    {
        $rancangan = rancangan::all();
        return view('masterData.rancangan', [
            'title' => 'Rancangan',
        ], compact('rancangan'));
    }

    public function rancangan_store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        rancangan::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function rancangan_update($id, Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        rancangan::where('id', $id)
                ->update($validateData);
        return back()->with('success', 'Berhasil Update Data');
    }

    public function kpengajuan()
    {
        $kpengajuan = kpengajuan::all();
        return view('masterData.kpengajuan', [
            'title' => 'Keterangan Pengajuan',
        ], compact('kpengajuan'));
    }

    public function kpengajuan_store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        kpengajuan::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function kpengajuan_update($id, Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        kpengajuan::where('id', $id)
                ->update($validateData);
        return back()->with('success', 'Berhasil Update Data');
    }

    public function kpengajuan_destroy($id)
    {
        kpengajuan::where('id', $id)->delete();

        return back()->with('success', 'Berhasil Hapus Data');
    }

    public function pemrakarsa()
    {
        $pemrakarsa = pemrakarsa::all();
        return view('masterData.pemrakarsa', [
            'title' => 'PEMRAKARSA',
        ], compact('pemrakarsa'));
    }

    public function pemrakarsa_store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        pemrakarsa::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function pemrakarsa_update($id, Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        pemrakarsa::where('id', $id)
                ->update($validateData);
        return back()->with('success', 'Berhasil Update Data');
    }

    public function pemrakarsa_destroy($id)
    {
        pemrakarsa::where('id', $id)->delete();

        return back()->with('success', 'Berhasil Hapus Data');
    }

    public function posisi()
    {
        $posisi = padministrasi::all();
        return view('masterData.posisi', [
            'title' => 'Posisi Administrasi',
        ], compact('posisi'));
    }

    public function posisi_store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        padministrasi::create($validateData);
        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function posisi_update($id, Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:70'
        ]);

        padministrasi::where('id', $id)
                ->update($validateData);
        return back()->with('success', 'Berhasil Update Data');
    }
}
