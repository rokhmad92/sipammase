<?php

namespace App\Http\Controllers;

use App\Models\perancang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class perancangController extends Controller
{
    public function index()
    {
        $perancang = perancang::with('jabatan')->get();
        return view('perancang.perancang', [
            'title' => 'Perancang'
        ], compact('perancang'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:50|unique:perancang,nama',
            'nip' => 'required|unique:perancang,nip',
            'jabatan' => 'required|max:150',
            'foto' => 'required|file|mimes:jpeg,jpg,png|max:5000'
        ]);

        $data = $request->input();
        $dataFile = $request->file();
        ($dataFile['foto']) ? $foto = $dataFile['foto']->store('images') : $foto = '';

        perancang::create([
            'nama' => $data['nama'],
            'nip' => $data['nip'],
            'jabatan' => $data['jabatan'],
            'foto' => $foto,
        ]);

        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(perancang $perancang, Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:50',
            'nip' => 'required',
            'jabatan' => 'required|max:150',
            'foto' => 'nullable|file|mimes:jpeg,jpg,png|max:5000'
        ]);

        $data = $request->input();
        $dataFile = $request->file();

        // check foto
        if ($request->file('foto') && $perancang->foto != null) {
            Storage::delete($perancang->foto);
            $foto = $dataFile['foto']->store('images');
        } elseif ($request->file('foto')) {
            $foto = $dataFile['foto']->store('images');
        } else {
            $foto = $perancang->foto;
        }

        perancang::where('id', $perancang->id)->update([
            'nama' => $data['nama'],
            'nip' => $data['nip'],
            'jabatan' => $data['jabatan'],
            'foto' => $foto,
        ]);

        return back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function destroy($id)
    {
        perancang::where('id', $id)->delete();

        return back()->with('success', 'Berhasil Hapus Data');
    }
}
