<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedule()
    {
        $data = [ 
                "title"         => "Data Jadwal",
                "menuSchedule"  => "active",
                "schedules"      => Schedule::with(['student','driver','vehicle'])->get(),
                
            ];
        return view('schedule/schedule', $data);
    }

    public function create()
    {
        $data = [
            "title"             => "Tambah Data Jadwal",
            "menuSchedule"      => "active",
            "students"         => Student::all(),
            "drivers"          => Driver::all(),
            "vehicles"         => Vehicle::all(),
        ];
        return view('schedule/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'nullable|exists:students,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'pickup_time' => 'nullable|date_format:H:i',
            'dropoff_time' => 'nullable|date_format:H:i',
            'pickup_location' => 'nullable|string|max:255',
            'dropoff_location' => 'nullable|string|max:255',
            'status' => 'required',
        ], [
            
            'student_id.exists' => 'Siswa tidak ditemukan',
            'driver_id.exists' => 'Sopir tidak ditemukan',
            'vehicle_id.exists' => 'Kendaraan tidak ditemukan',
            'pickup_time.date_format' => 'Waktu penjemputan tidak valid',
            'dropoff_time.date_format' => 'Waktu pengantaran tidak valid',
            'pickup_location.max' => 'Lokasi penjemputan terlalu panjang',
            'dropoff_location.max' => 'Lokasi pengantaran terlalu panjang',
            'status.required' => 'Status wajib diisi',
        ]);

        $schedule = new Schedule();
        $schedule->student_id = $request->student_id;
        $schedule->driver_id = $request->driver_id;
        $schedule->vehicle_id = $request->vehicle_id;
        $schedule->pickup_time = $request->pickup_time;
        $schedule->dropoff_time = $request->dropoff_time;
        $schedule->pickup_location = $request->pickup_location;
        $schedule->dropoff_location = $request->dropoff_location;
        $schedule->status= $request->status;
        $schedule->save();

        return redirect()->route('schedule')->with('success', 'Data jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $data = [
            "title"             => "Edit Data Jadwal",
            "menuSchedule"      => "active",
            "schedule"          => $schedule,
            "students"         => Student::all(),
            "drivers"          => Driver::all(),
            "vehicles"         => Vehicle::all(),
        ];
        return view('schedule/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'nullable|exists:students,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'pickup_time' => 'nullable|date_format:H:i',
            'dropoff_time' => 'nullable|date_format:H:i',
            'pickup_location' => 'nullable|string|max:255',
            'dropoff_location' => 'nullable|string|max:255',
            'status_id' => 'nullable|exists:statuses,id',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->student_id = $request->student_id;
        $schedule->driver_id = $request->driver_id;
        $schedule->vehicle_id = $request->vehicle_id;
        $schedule->pickup_time = $request->pickup_time;
        $schedule->dropoff_time = $request->dropoff_time;
        $schedule->pickup_location = $request->pickup_location;
        $schedule->dropoff_location = $request->dropoff_location;
        $schedule->status = $request->status;
        $schedule->save();

        return redirect()->route('schedule')->with('success', 'Data jadwal berhasil diupdate.');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule')->with('success', 'Data jadwal berhasil dihapus.');
    }


}
