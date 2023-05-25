<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\harmonisasi;
use App\Models\pemrakarsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
