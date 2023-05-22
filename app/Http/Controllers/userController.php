<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\role;
use App\Models\User;
use App\Models\tahun;
use App\Models\rancangan;
use App\Models\pemrakarsa;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(User $user)
    {
        $getUser = $user;
        $tahun = tahun::all();
        return view('user.profile', [
            'title' => $user->namaPanjang
        ], compact('getUser', 'tahun'));
    }

    public function index_update($username, Request $request)
    {
        $request->validate([
            'username' => 'required|min:8|max:20',
            'new_password' => 'nullable|min:8|max:20|confirmed',
            'namaPanjang' => 'required|max:70',
            'email' => 'required|email:rfc,dns',
            'alamat' => 'required|max:80',
            'rancangan' => 'required|exists:rancangan,id',
            'pemrakarsa' => 'required|exists:pemrakarsa,id',
            'tahun' => 'required|exists:tahun,no',
        ], [
            'confirmed' => 'Confirmasi Password Tidak Sama'
        ]);
        $data = $request->input();
        $tahun_id = tahun::where('no', $data['tahun'])->first('id');

        // password Check
        if ($data['new_password'] !== null) {
            User::where('username', $username)
            ->update([
                'username' => $data['username'],
                'password' => bcrypt($data['new_password']),
                'namaPanjang' => $data['namaPanjang'],
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'rancangan_id' => $data['rancangan'],
                'pemrakarsa_id' => $data['pemrakarsa'],
                'tahun_id' => $tahun_id->id,
            ]);
            return redirect('/profile/' . $data['username']);
        } else {
            User::where('username', $username)
            ->update([
                'username' => $data['username'],
                'namaPanjang' => $data['namaPanjang'],
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'rancangan_id' => $data['rancangan'],
                'pemrakarsa_id' => $data['pemrakarsa'],
                'tahun_id' => $tahun_id->id,
            ]);
            return redirect('/profile/' . $data['username']);
        }
    }

    public function users()
    {
        $users = User::all();
        return view('user.users', [
            'title' => 'Users'
        ], compact('users'));
    }

    public function create()
    {
        $rancangan = rancangan::all();
        $pemrakarsa = pemrakarsa::all();
        $role = role::all();
        return view('user.usersTambah', [
            'title' => 'Users'
        ], compact('rancangan', 'pemrakarsa', 'role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:8|max:20',
            'password' => 'nullable|min:8|max:20',
            'namaPanjang' => 'required|max:70',
            'email' => 'required|email:rfc,dns',
            'alamat' => 'required|max:80',
            'rancangan' => 'required|exists:rancangan,id',
            'role' => 'required|exists:role,id',
            'pemrakarsa' => 'required|exists:pemrakarsa,id',
        ]);
        $data = $request->input();
        $date = Carbon::now()->format('Y');
        $tahun_id = tahun::where('no', $date)->first('id');

        User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'namaPanjang' => $data['namaPanjang'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'rancangan_id' => $data['rancangan'],
            'pemrakarsa_id' => $data['pemrakarsa'],
            'role_id' => $data['role'],
            'tahun_id' => $tahun_id->id,
        ]);

        return redirect('/users');
    }
}
