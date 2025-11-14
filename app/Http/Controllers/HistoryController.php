<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Status;
use App\Models\History;
use App\Models\Student;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function history()
    {
        $data = [ 
                "title"         => "Data Riwayat",
                "menuHistory"   => "active",
                "histories"     => History::with(['student','driver','vehicle','status'])->get(),
            ];
        return view('history/history', $data);
    }

    public function create()
    {
        $data = [
            "title"            => "Tambah Data Riwayat",
            "menuHistory"      => "active",
            "students"         => Student::all(),
            "drivers"          => Driver::all(),
            "vehicles"         => Vehicle::all(),
            "statuses"         => Status::all(),
            

        ];
        return view('history/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_time' => 'required|date_format:H:i:s',
            'dropoff_time' => 'required|date_format:H:i:s',
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
        ], [
            'driver_id.exists' => 'Sopir tidak ditemukan',
            'vehicle_id.exists' => 'Kendaraan tidak ditemukan',
            'pickup_time.date_format' => 'Waktu penjemputan tidak valid',
            'dropoff_time.date_format' => 'Waktu pengantaran tidak valid',
            'pickup_location.max' => 'Lokasi penjemputan terlalu panjang',
            'dropoff_location.max' => 'Lokasi pengantaran terlalu panjang',
            'status_id.exists' => 'Status tidak ditemukan',
        ]);
        

        $history = new History();
        $history->driver_id = $request->driver_id;
        $history->vehicle_id = $request->vehicle_id;
        $history->pickup_time = $request->pickup_time;
        $history->dropoff_time = $request->dropoff_time;
        $history->pickup_location = $request->pickup_location;
        $history->dropoff_location = $request->dropoff_location;
        $history->status_id = $request->status_id;
        $history->save();


        return redirect()->route('history')->with('success', 'Data riwayat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $history = History::findOrFail($id);
        $data = [
            "title"             => "Edit Data Riwayat",
            "menuHistory"       => "active",
            "history"           => $history,
            "students"         => Student::all(),
            "drivers"          => Driver::all(),
            "vehicles"         => Vehicle::all(),
            "statuses"         => Status::all(),

        ];
        return view('history/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_time' => 'required|date_format:H:i:s',
            'dropoff_time' => 'required|date_format:H:i:s',
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
        ], [
            'driver_id.exists' => 'Sopir tidak ditemukan',
            'vehicle_id.exists' => 'Kendaraan tidak ditemukan',
            'pickup_time.date_format' => 'Waktu penjemputan tidak valid',
            'dropoff_time.date_format' => 'Waktu pengantaran tidak valid',
            'pickup_location.max' => 'Lokasi penjemputan terlalu panjang',
            'dropoff_location.max' => 'Lokasi pengantaran terlalu panjang',
            'status_id.exists' => 'Status tidak ditemukan',
        ]);

        $history = History::findOrFail($id);
        $history->driver_id = $request->driver_id;
        $history->vehicle_id = $request->vehicle_id;
        $history->pickup_time = $request->pickup_time;
        $history->dropoff_time = $request->dropoff_time;
        $history->pickup_location = $request->pickup_location;
        $history->dropoff_location = $request->dropoff_location;
        $history->status_id = $request->status_id;
        $history->save();

        return redirect()->route('history')->with('success', 'Data riwayat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $history = History::findOrFail($id);
        $history->delete();

        return redirect()->route('history')->with('success', 'Data riwayat berhasil dihapus.');
    }
}
