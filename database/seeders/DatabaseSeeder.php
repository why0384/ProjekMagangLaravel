<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Driver;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\DriverVehicle;
use App\Models\Status;
use App\Models\RideRequest;
use App\Models\Schedule;
use App\Models\History;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // 1️⃣ USER
        // =========================
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

        $siswa = User::create([
            'name' => 'Budi Santoso',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'siswa',
        ]);

        $sopir = User::create([
            'name' => 'Pak Sopir',
            'email' => 'sopir@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'sopir',
        ]);

        // =========================
        // 2️⃣ STUDENT
        // =========================
        $student = Student::create([
            'user_id' => $siswa->id,
            'name_student' => 'Budi Santoso',
            'class_student' => '6A',
            'address_student' => 'Jl. Melati No. 12, Solo',
            'phone_student' => '081234567890',
            'service_student' => 'antar-jemput',
            'status_student' => 'active',
            'photo_student' => null,
        ]);

        // =========================
        // 3️⃣ DRIVER
        // =========================
        $driver = Driver::create([
            'user_id' => $sopir->id,
            'name_driver' => 'Pak Eko',
            'birthdate_driver' => '1985-03-15',
            'address_driver' => 'Jl. Mawar No. 5, Solo',
            'phone_driver' => '081298765432',
            'status_driver' => 'active',
        ]);

        // =========================
        // 4️⃣ VEHICLE
        // =========================
        $vehicle = Vehicle::create([
            'license_plate' => 'AD1234CD',
            'name_vehicle' => 'Toyota Avanza',
            'type_vehicle' => 'Car',
            'year_vehicle' => '2021',
        ]);

        // =========================
        // 5️⃣ DRIVER_VEHICLE
        // =========================
        DriverVehicle::create([
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
        ]);

        // =========================
        // 6️⃣ STATUS
        // =========================
        $status1 = Status::create([
            'kode_status' => 'ST01',
            'nama_status' => 'Pengemudi siap',
        ]);

        $status2 = Status::create([
            'kode_status' => 'ST02',
            'nama_status' => 'Dalam perjalanan menjemput',
        ]);

        $status3 = Status::create([
            'kode_status' => 'ST03',
            'nama_status' => 'Selesai mengantar',
        ]);

        // =========================
        // 7️⃣ RIDE REQUEST
        // =========================
        $rideRequest = RideRequest::create([
            'student_id' => $student->id,
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
            'pickup_location' => 'Jl. Melati No. 12, Solo',
            'status' => 'konfirmasi',
            'queue_number' => 1,
        ]);

        // =========================
        // 8️⃣ SCHEDULE
        // =========================
        $schedule = Schedule::create([
            'student_id' => $student->id,
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
            'pickup_time' => '06:30:00',
            'dropoff_time' => '13:00:00',
            'pickup_location' => 'Jl. Melati No. 12, Solo',
            'dropoff_location' => 'SD Negeri Ketoyan 01',
            'status' => 'aktif',
        ]);

        // =========================
        // 9️⃣ HISTORY
        // =========================
        History::create([
            'schedule_id' => $schedule->id,
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
            'pickup_time' => '06:35:00',
            'dropoff_time' => '13:05:00',
            'pickup_location' => 'Jl. Melati No. 12, Solo',
            'dropoff_location' => 'SD Negeri Ketoyan 01',
            'status_id' => $status3->id,
        ]);
    }
}
