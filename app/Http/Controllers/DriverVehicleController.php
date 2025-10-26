<?php

namespace App\Http\Controllers; 

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\DriverVehicle;
use App\Models\User;

class DriverVehicleController extends Controller
{
    public function driver_vehicle()
    {
        $data = [
            "title"                 => "Konfigurasi Sopir dan Kendaraan",
            "menuDriverVehicle"     => "active",
            "drivervehicle"         => DriverVehicle::with(['driver','vehicle'])->get(),
        ];
        return view('driver_vehicle/driver_vehicle', $data);
    }

    public function create()
    {
        $data = [
            "title"                   => "Tambah Data Sopir dan Kendaraan",
            "menuDriverVehicle"       => "active",
            "drivers"                 => Driver::get(),
            "vehicles"                => Vehicle::get(),
        ];
        return view('driver_vehicle/create', $data);
    }   

    public function store(Request $request)
    {
        
        
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $exists = DriverVehicle::where('driver_id', $request->driver_id)
                ->where('vehicle_id', $request->vehicle_id)
                ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Kombinasi sopir dan kendaraan ini sudah terdaftar!');
        }

        DriverVehicle::create([
            'driver_id' => $request->driver_id,
            'vehicle_id' => $request->vehicle_id,
        ]);

        return redirect()->route('driver_vehicle')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $data = [
            "title"                   => "Edit Konfigurasi Sopir dan Kendaraan",
            "menuDriverVehicle"       => "active",
            "drivervehicle"           => DriverVehicle::findOrFail($id),
            "drivers"                 => Driver::get(),
            "vehicles"                => Vehicle::get(),

        ];
        
        return view('driver_vehicle/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'driver_id'  => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
        ], [
            'driver_id.required'  => 'Sopir wajib diisi.',
            'driver_id.exists'    => 'Sopir tidak ditemukan.',
            'vehicle_id.required' => 'Kendaraan wajib diisi.',
            'vehicle_id.exists'   => 'Kendaraan tidak ditemukan.',
        ]);

        $driverVehicle = DriverVehicle::findOrFail($id);

        // 🔍 Cek apakah kombinasi sopir + kendaraan sudah digunakan oleh data lain
        $exists = DriverVehicle::where('driver_id', $request->driver_id)
                    ->where('vehicle_id', $request->vehicle_id)
                    ->where('id', '!=', $id) // pastikan bukan record yang sedang diedit
                    ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Kombinasi sopir dan kendaraan ini sudah terdaftar!');
        }

        // Update data
        $driverVehicle->update([
            'driver_id'  => $request->driver_id,
            'vehicle_id' => $request->vehicle_id,
        ]);

        return redirect()->route('driver_vehicle')
            ->with('success', 'Konfigurasi sopir dan kendaraan berhasil diperbarui!');;
    }

    public function destroy($id)
    {
        $drivervehicle = DriverVehicle::findOrFail($id);
        $drivervehicle->delete();

        return redirect()->route('driver_vehicle')->with('success', 'Konfigurasi sopir dan kendaraan berhasil dihapus.');
    }


}
