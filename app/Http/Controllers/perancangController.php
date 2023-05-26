<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\perancang;
use Illuminate\Http\Request;

class perancangController extends Controller
{
    public function index()
    {
        $perancang = perancang::with('jabatan')->get();
        $jabatan = jabatan::all();
        return view('perancang.perancang', [
            'title' => 'Perancang'
        ], compact('perancang', 'jabatan'));
    }
}
