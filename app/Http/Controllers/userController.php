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
            'rancangan' => 'required|exists:rancangan,nama',
            'pemrakarsa' => 'required|exists:pemrakarsa,nama',
            'tahun' => 'required|exists:tahun,no',
        ], [
            'confirmed' => 'Confirmasi Password Tidak Sama'
        ]);
        $data = $request->input();
        $tahun_id = tahun::where('no', $data['tahun'])->first('id');
        $rancangan_id = rancangan::where('nama', $data['rancangan'])->first('id');
        $pemrakarsa_id = pemrakarsa::where('nama', $data['pemrakarsa'])->first('id');

        // password Check
        if ($data['new_password'] !== null) {
            User::where('username', $username)
            ->update([
                'username' => $data['username'],
                'password' => bcrypt($data['new_password']),
                'namaPanjang' => $data['namaPanjang'],
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'rancangan_id' => $rancangan_id->id,
                'pemrakarsa_id' => $pemrakarsa_id->id,
                'tahun_id' => $tahun_id->id,
            ]);
            return redirect('/users')->with('success', 'Berhasil Update Data');
        } else {
            User::where('username', $username)
            ->update([
                'username' => $data['username'],
                'namaPanjang' => $data['namaPanjang'],
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'rancangan_id' => $rancangan_id->id,
                'pemrakarsa_id' => $pemrakarsa_id->id,
                'tahun_id' => $tahun_id->id,
            ]);
            return redirect('/profile/' . $data['username'])->with('success', 'Berhasil Update Data');
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
            'username' => 'required|max:20|unique:user,username',
            'password' => 'nullable|max:20',
            'namaPanjang' => 'required|max:70|unique:user,namaPanjang',
            'email' => 'required|email:rfc,dns|unique:user,email',
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

        return redirect('/users')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit(User $user)
    {
        $rancangan = rancangan::all();
        $pemrakarsa = pemrakarsa::all();
        $role = role::all();
        $users = $user;
        return view('user.usersEdit', [
            'title' => 'User Edit'
        ], compact('rancangan', 'pemrakarsa', 'role', 'users'));
    }

    public function update($username, Request $request)
    {
        $request->validate([
            'username' => 'required|max:20',
            'password' => 'nullable|max:20',
            'namaPanjang' => 'required|max:70',
            'email' => 'required|email:rfc,dns',
            'alamat' => 'required|max:80',
            'rancangan' => 'required|exists:rancangan,id',
            'pemrakarsa' => 'required|exists:pemrakarsa,id',
            'role' => 'required|exists:role,id',
        ]);
        $data = $request->input();

        // password Check
        if ($data['password'] !== null) {
            User::where('username', $username)
            ->update([
                'username' => $data['username'],
                'password' => bcrypt($data['password']),
                'namaPanjang' => $data['namaPanjang'],
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'rancangan_id' => $data['rancangan'],
                'pemrakarsa_id' => $data['pemrakarsa'],
                'role_id' => $data['role']
            ]);
            return redirect('/users')->with('success', 'Berhasil Update Data');
        } else {
            User::where('username', $username)
            ->update([
                'username' => $data['username'],
                'namaPanjang' => $data['namaPanjang'],
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'rancangan_id' => $data['rancangan'],
                'pemrakarsa_id' => $data['pemrakarsa'],
                'role_id' => $data['role']
            ]);
            return redirect('/users')->with('success', 'Berhasil Update Data');
        }
    }

    public function destroy($username)
    {
        User::where('username', $username)
            ->delete();

        return redirect('/users')->with('success', 'Berhasil Hapus Data');
    }
}
