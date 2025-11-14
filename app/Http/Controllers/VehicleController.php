<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicle()
    { 
        $data = [
            "title"         => "Data Kendaraan",
            "menuVehicle"   => "active",
            "vehicle"       => Vehicle::get(),
        ];
        return view('vehicle/vehicle', $data);
    } 

    public function create()
    {
        $data = [
            "title"       => "Tambah Data Kendaraan",
            "menuVehicle" => "active",
        ];
        return view('vehicle/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required',
            'name_vehicle'  => 'required',
            'type_vehicle'  => 'required',
            'year_vehicle'  => 'required|digits:4',
            'photo_vehicle' => 'nullable|image|mimes:jpg,jpeg,png|max:5000',

        ], [
            'license_plate.required' => 'Plat nomor wajib diisi',
            'name_vehicle.required'  => 'Nama kendaraan wajib diisi',
            'type_vehicle.required'  => 'Merk kendaraan wajib diisi',
            'year_vehicle.required'  => 'Tahun kendaraan wajib diisi',
            'year_vehicle.digits'    => 'Tahun kendaraan harus 4 digit',
            'photo_vehicle.image' => 'Foto siswa harus berupa gambar',
            'photo_vehicle.mimes' => 'Foto siswa harus berformat jpg, jpeg, atau png',
            'photo_vehicle.max' => 'Ukuran foto siswa maksimal 5MB',
        ]);

        $vehicle = new Vehicle();
        $vehicle->license_plate = $request->license_plate;
        $vehicle->name_vehicle  = $request->name_vehicle;
        $vehicle->type_vehicle  = $request->type_vehicle;
        $vehicle->year_vehicle  = $request->year_vehicle;

        // ✅ Upload foto jika ada
        if ($request->hasFile('photo_vehicle')) {
            $file = $request->file('photo_vehicle');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/vehicles'), $filename);
            $vehicle->photo_vehicle = $filename;
        }

        $vehicle->save();

        return redirect()->route('vehicle')->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            "title"        => "Edit Data Kendaraan",
            "menuVehicle"  => "active",
            "vehicle"      => Vehicle::findOrFail($id),
        ];
        return view('vehicle/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'license_plate' => 'required',
            'name_vehicle'  => 'required',
            'type_vehicle'  => 'required',
            'year_vehicle'  => 'required|digits:4',
            'photo_vehicle' => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
            
        ], [
            'license_plate.required' => 'Plat nomor wajib diisi',
            'name_vehicle.required'  => 'Nama kendaraan wajib diisi',
            'type_vehicle.required'  => 'Merk kendaraan wajib diisi',
            'year_vehicle.required'  => 'Tahun kendaraan wajib diisi',
            'year_vehicle.digits'    => 'Tahun kendaraan harus 4 digit',
            'photo_vehicle.image'    => 'Foto kendaraan harus berupa gambar',
            'photo_vehicle.mimes'    => 'Foto kendaraan harus berformat jpg, jpeg, atau png',
            'photo_vehicle.max'      => 'Ukuran foto kendaraan maksimal 5MB',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->license_plate = $request->license_plate;
        $vehicle->name_vehicle  = $request->name_vehicle;
        $vehicle->type_vehicle  = $request->type_vehicle;
        $vehicle->year_vehicle  = $request->year_vehicle;
        
        // ✅ Update foto baru jika diupload
        if ($request->hasFile('photo_vehicle')) {
            // hapus foto lama
            if ($vehicle->photo_vehicle && file_exists(public_path('uploads/vehicles/'.$vehicle->photo_vehicle))) {
                unlink(public_path('uploads/vehicles/'.$vehicle->photo_vehicle));
            }

            $file = $request->file('photo_vehicle');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/vehicles'), $filename);
            $vehicle->photo_vehicle = $filename;
        }

        $vehicle->save();

        return redirect()->route('vehicle')->with('success', 'Data kendaraan berhasil diperbarui!');
    }   


    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicle')->with('success', 'Data kendaraan berhasil dihapus!');
    }   

}
