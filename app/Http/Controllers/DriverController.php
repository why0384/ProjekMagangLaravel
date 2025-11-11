<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function driver()
    { 
        $data = [ 
                "title"         => "Data Sopir",
                "menuDriver"   => "active",
                "driver"       => Driver::get(),
            ];
        return view('driver/driver', $data);
    } 

    public function create()
    {
        $data = [
            "title"             => "Tambah Data Sopir",
            "menuDriver"       => "active",
            "users"             => User::where('role', 'Sopir')->get(),
        ];
        return view('driver/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name_driver' => 'required',
            'birthdate_driver' => 'required|date',
            'address_driver' => 'required',
            'phone_driver' => 'required',
            'status_driver' => 'required',
        ], [
            'user_id.required' => 'User wajib diisi ',
            'user_id.exists' => 'User tidak ditemukan',
            'name_driver.required' => 'Nama sopir wajib diisi',
            'birthdate_driver.required' => 'Tanggal lahir sopir wajib diisi',
            'birthdate_driver.date' => 'Tanggal lahir sopir tidak valid',
            'address_driver.required' => 'Alamat sopir wajib diisi',
            'phone_driver.required' => 'No. Telepon sopir wajib diisi',
            'status_driver.required' => 'Status sopir wajib diisi',
        ]);

 
        $driver = new Driver();
        $driver->user_id = $request->user_id;
        $driver->name_driver = $request->name_driver;
        $driver->birthdate_driver = $request->birthdate_driver;
        $driver->address_driver = $request->address_driver;
        $driver->phone_driver = $request->phone_driver;
        $driver->status_driver = $request->status_driver;
        $driver->save();

        return redirect()->route('driver')->with('success', 'Data sopir berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        $status_driver = $driver->status_driver;
        $data = [
            "title"             => "Edit Data Sopir",
            "menuDriver"        => "active",
            "users"             => User::where('role', 'Sopir')->get(),
            "status_driver"     => $status_driver,
            "driver"            => Driver::FindORFail($id),    
        ];
        return view('driver/edit', $data);
    }

    public function update(Request $request, $id)
    {
        // validasi
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name_driver' => 'required',
            'birthdate_driver' => 'required|date',
            'address_driver' => 'required',
            'phone_driver' => 'required',
            'status_driver' => 'required',
        ], [
            'user_id.required' => 'User wajib diisi ',
            'user_id.exists' => 'User tidak ditemukan',
            'name_driver.required' => 'Nama sopir wajib diisi',
            'birthdate_driver.required' => 'Tanggal lahir sopir wajib diisi',
            'birthdate_driver.date' => 'Tanggal lahir sopir tidak valid',
            'address_driver.required' => 'Alamat sopir wajib diisi',
            'phone_driver.required' => 'No. Telepon sopir wajib diisi',
            'status_driver.required' => 'Status sopir wajib diisi',
        ]); 

        // ambil data sopir lama
        $driver = Driver::findOrFail($id);
        $driver->name_driver = $request->name_driver;
        $driver->birthdate_driver = $request->birthdate_driver;
        $driver->address_driver = $request->address_driver;
        $driver->phone_driver = $request->phone_driver;
        $driver->status_driver = $request->status_driver;
        $driver->save();

        // redirect
        return redirect()->route('driver')->with('success', 'Data sopir berhasil diperbarui');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('driver')->with('success', 'Data sopir berhasil dihapus!');
    }  


    public function toggleStatus($id)
    {
        $driver = Driver::findOrFail($id);

        // Ubah status
        $driver->status_driver = $driver->status_driver === 'active' ? 'inactive' : 'active';
        $driver->save();

        // Kembalikan response JSON
        return response()->json([
            'success' => true,
            'status_driver' => $driver->status_driver
        ]);
    }

}
