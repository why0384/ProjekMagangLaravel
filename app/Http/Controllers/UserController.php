<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $data = [
            "title"          => "Data User",
            "menuUser"       => "active",
            "user"           => User::get(),
        ];
        return view('user/user', $data);
    }

    public function create()
    {
        $data = [
            "title"          => "Tambah Data User",
            "menuUser"       => "active",
        ];
        return view('user/create', $data);
    }

    public function edit($id) 
    {
        $data = [
            "title"          => "Edit Data User",
            "menuUser"       => "active",
            "user"           => User::FindORFail($id),    
        ];
        return view('user/edit', $data);
    }

    public function update(Request $request, $id)
    {
        // validasi
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $id,
            'role'     => 'required',
            'password' => 'nullable|confirmed',
        ], [
            'name.required'      => 'Nama wajib diisi',
            'email.required'     => 'Email wajib diisi',
            'email.email'        => 'Email tidak valid',
            'email.unique'       => 'Email sudah terdaftar',
            'role.required'      => 'Role wajib diisi',
            'password.confirmed' => 'Password tidak sesuai dengan konfirmasi',
        ]); 

        // ambil data user lama
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // jika password diisi, update juga
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // redirect
        return redirect()->route('user')->with('success', 'Data user berhasil diperbarui');
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'role'                  => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
        ],[
            'name.required'         => 'Nama wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'role.required'         => 'Role wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password_confirmation.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sesuai dengan konfirmasi',
        ]); 

        // simpan data
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request -> role;
            $user->password = Hash:: make ($request->password);
            $user->save();
 
        // redirect
        return redirect()->route('user')->with('success', 'Data user berhasil disimpan');
        return redirect()->route('user')->with('error', 'Data user gagal disimpan');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data user berhasil dihapus!');
        return redirect()->route('user')->with('error', 'Data user gagal dihapus!');
    }

}
