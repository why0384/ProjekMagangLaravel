<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Student;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUser = User::count();
        $totalSiswa = Student::count();
        $totalSopir = Driver::count();
        $totalKendaraan = Vehicle::count();

        $data = [
            "title"         => "Dashboard",
            "menuDashboard" => "active",
        ];
        return view('dashboard', compact('totalUser', 'totalSiswa', 'totalSopir', 'totalKendaraan'), $data);
    }
}
