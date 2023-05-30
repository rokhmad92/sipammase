<?php

namespace App\Http\Controllers;

use App\Models\tahun;
use App\Models\agenda;
use App\Models\pemrakarsa;
use App\Models\harmonisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dataController extends Controller
{
    public function index() 
    {
        $pemrakarsa = pemrakarsa::all();
        $tahun = tahun::all();
        $Pengajuan = '';
        $Administrasi = '';
        $Rapat = '';
        $Penyampaian = '';
        $pemrakarsaGet = '';
        $tahunGet = '';

        return view('grafik.grafik', [
            'title' => 'Grafik Harmonisasi'
        ], compact('Pengajuan', 'Administrasi', 'Rapat', 'Penyampaian', 'pemrakarsa', 'pemrakarsaGet', 'tahun', 'tahunGet'));
    }

    public function grafikAdmin(Request $request)
    {
        $pemrakarsaGet = $request->input('grafikPemrakarsa');
        $tahunGet = $request->input('grafikTahun');
        $pemrakarsa = pemrakarsa::all();
        $get = pemrakarsa::where('nama', $pemrakarsaGet)->first('id');
        $tahun = tahun::all();
        $tahunId = tahun::where('no', $tahunGet)->first('id');

        $Pengajuan = harmonisasi::where('padministrasi_id', 1)->where('pemrakarsa_id', $get->id)->where('tahun_id', $tahunId->id)->count();
        $Administrasi = harmonisasi::where('padministrasi_id', 2)->where('pemrakarsa_id', $get->id)->where('tahun_id', $tahunId->id)->count();
        $Rapat = harmonisasi::where('padministrasi_id', 3)->where('pemrakarsa_id', $get->id)->where('tahun_id', $tahunId->id)->count();
        $Penyampaian = harmonisasi::where('pemrakarsa_id', $get->id)->where('tahun_id', $tahunId->id)->where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();

        return view('grafik.grafik', [
            'title' => 'Grafik Harmonisasi'
        ], compact('Pengajuan', 'Administrasi', 'Rapat', 'Penyampaian', 'pemrakarsa', 'pemrakarsaGet', 'tahun', 'tahunGet'));
    }

    public function grafik(Request $request)
    {
        $pemrakarsa = $request->input('grafik');
        $tahunGet = $request->input('grafikTahun');
        $get = pemrakarsa::where('nama', $pemrakarsa)->first('id');
        $tahun = tahun::where('no', $tahunGet)->first('id');

        $Pengajuan = harmonisasi::where('padministrasi_id', 1)->where('pemrakarsa_id', $get->id)->where('tahun_id', $tahun->id)->count();
        $Administrasi = harmonisasi::where('padministrasi_id', 2)->where('pemrakarsa_id', $get->id)->where('tahun_id', $tahun->id)->count();
        $Rapat = harmonisasi::where('padministrasi_id', 3)->where('tahun_id', $tahun->id)->where('pemrakarsa_id', $get->id)->where('tahun_id', $tahun->id)->count();
        $Penyampaian = harmonisasi::where('pemrakarsa_id', $get->id)->where('tahun_id', $tahun->id)->where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();

        $data = harmonisasi::where('pemrakarsa_id', $get->id)->where('tahun_id', $tahun->id)->get();

        return view('grafik.grafikPublic', [
            'title' => 'Grafik Harmonisasi'
        ], compact('Pengajuan', 'Administrasi', 'Rapat', 'Penyampaian', 'pemrakarsa', 'data'));
    }

    public function agenda()
    {
        $agenda = agenda::with('pemrakarsa')->get();
        $pemrakarsa = pemrakarsa::all();
        return view('agenda.agenda', [
            'title' => 'Agenda Rapat'
        ], compact('agenda', 'pemrakarsa'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:50|unique:agenda,nama',
            'pemrakarsa' => 'required|exists:pemrakarsa,nama',
            'harmonisasi' => 'required|max:50',
            'tanggal' => 'required',
            'lokasi' => 'required|max:100'
        ]);

        $data = $request->input();
        $pemrakarsa_id = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
        agenda::create([
            'nama' => $data['nama'],
            'pemrakarsa_id' => $pemrakarsa_id->id,
            'harmonisasi' => $data['harmonisasi'],
            'tanggal' => $data['tanggal'],
            'lokasi' => $data['lokasi'],
        ]);

        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(agenda $agenda, Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'pemrakarsa' => 'required|exists:pemrakarsa,nama',
            'harmonisasi' => 'required|max:50',
            'tanggal' => 'required',
            'lokasi' => 'required|max:100',
            'foto' => 'nullable|file|mimes:jpeg,jpg,png|max:5000'
        ]);
        $data = $request->input();
        $dataFile = $request->file();

        $pemrakarsa_id = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');
        ($dataFile['foto']) ? $foto = $dataFile['foto']->store('images') : $foto = '';

        agenda::where('nama', $agenda->nama)
            ->update([
                'nama' => $data['nama'],
                'pemrakarsa_id' => $pemrakarsa_id->id,
                'harmonisasi' => $data['harmonisasi'],
                'tanggal' => $data['tanggal'],
                'lokasi' => $data['lokasi'],
                'foto' => $foto
            ]);

        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function hapus(agenda $agenda)
    {
        ($agenda->foto) ? Storage::delete($agenda->foto) : '';
        agenda::where('nama', $agenda->nama)->delete();
        return back()->with('success', 'Berhasil Hapus Data');
    }

    public function destroy(agenda $agenda)
    {
        Storage::delete($agenda->foto);
        agenda::where('nama', $agenda->nama)->update([
            'foto' => null
        ]);
        return back()->with('success', 'Berhasil Hapus Foto');
    }
}
