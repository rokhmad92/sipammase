<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengajuanController extends Controller
{
    public function index()
    {
        return view('pengajuan.pengajuan', [
            'title' => 'Pengajuan Harmonisasi'
        ]);
    }
}
