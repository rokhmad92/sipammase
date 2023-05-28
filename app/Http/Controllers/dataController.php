<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\harmonisasi;
use App\Models\pemrakarsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dataController extends Controller
{
    public function index(Request $request)
    {
        $pemrakarsa = $request->input('grafik');
        $get = pemrakarsa::where('nama', $pemrakarsa)->first('id');

        $Pengajuan = harmonisasi::where('padministrasi_id', 1)->where('pemrakarsa_id', $get->id)->count();
        $Administrasi = harmonisasi::where('padministrasi_id', 2)->where('pemrakarsa_id', $get->id)->count();
        $Rapat = harmonisasi::where('padministrasi_id', 3)->where('pemrakarsa_id', $get->id)->count();
        $Penyampaian = harmonisasi::where('pemrakarsa_id', $get->id)->where('padministrasi_id', 4)->orWhere('padministrasi_id', 5)->count();
        $data = harmonisasi::where('pemrakarsa_id', $get->id)->get();

        return view('grafik', [
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
            'foto' => ''
        ]);
        return back()->with('success', 'Berhasil Hapus Foto');
    }
}
