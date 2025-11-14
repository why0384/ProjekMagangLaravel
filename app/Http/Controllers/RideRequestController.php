<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\RideRequest;
use Illuminate\Http\Request;

class RideRequestController extends Controller
{
    public function riderequest()
    {
        $data = [
            'title' => 'Ride Requests',
            'menuRideRequest' => 'active',
            'rideRequests' => RideRequest::with(['student', 'driver', 'vehicle'])->get(),
            
            
            
        ];   
        return view('riderequest/riderequest', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Ride Request',
            'menuRideRequest' => 'active',
            'students' => Student::all(),
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all(),
            
        ];   
        return view('riderequest/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_location' => 'required',
            'status' => 'required',
        ], [
            'student_id.required' => 'Siswa wajib diisi',
            'student_id.exists' => 'Siswa tidak ditemukan',
            'driver_id.required' => 'Sopir wajib diisi',
            'driver_id.exists' => 'Sopir tidak ditemukan',
            'vehicle_id.required' => 'Kendaraan wajib diisi',
            'vehicle_id.exists' => 'Kendaraan tidak ditemukan',
            'pickup_location.required' => 'Lokasi penjemputan wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        // Ambil nomor antrian terakhir
        $lastQueue = RideRequest::max('queue_number');

        // Jika belum ada data → mulai dari 1
        $nextQueue = $lastQueue ? $lastQueue + 1 : 1;
        
        $rideRequest = new RideRequest();
        $rideRequest->student_id = $request->student_id;
        $rideRequest->driver_id = $request->driver_id;
        $rideRequest->vehicle_id = $request->vehicle_id;
        $rideRequest->pickup_location = $request->pickup_location;
        $rideRequest->status = $request->status;
        $rideRequest->queue_number = $nextQueue;
        $rideRequest->save();

        return redirect()->route('riderequest')->with('success', 'Ride request created successfully.');
    }
    public function edit($id)
    {
        $rideRequest = RideRequest::findOrFail($id);

        $data = [
            'title' => 'Edit Ride Request',
            'menuRideRequest' => 'active',
            'rideRequest' => $rideRequest,
            'students' => Student::all(),
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all(),
            
        ];   
        return view('riderequest/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_location' => 'required',
            'status' => 'required',
        ], [
            'student_id.required' => 'Siswa wajib diisi',
            'student_id.exists' => 'Siswa tidak ditemukan',
            'driver_id.required' => 'Sopir wajib diisi',
            'driver_id.exists' => 'Sopir tidak ditemukan',
            'vehicle_id.required' => 'Kendaraan wajib diisi',
            'vehicle_id.exists' => 'Kendaraan tidak ditemukan',
            'pickup_location.required' => 'Lokasi penjemputan wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        $rideRequest = RideRequest::findOrFail($id);
        $rideRequest->student_id = $request->student_id;
        $rideRequest->driver_id = $request->driver_id;
        $rideRequest->vehicle_id = $request->vehicle_id;
        $rideRequest->pickup_location = $request->pickup_location;
        $rideRequest->status = $request->status;
        $rideRequest->save();

        return redirect()->route('riderequest')->with('success', 'Ride request updated successfully.');
    }

    public function destroy($id)
    {
        $rideRequest = RideRequest::findOrFail($id);
        $rideRequest->delete();

        return redirect()->route('riderequest')->with('success', 'Ride request deleted successfully.');
    }
}
