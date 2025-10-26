<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Driver;
use App\Models\Student;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'siswa',
        ]);

        User::create([
            'name' => 'sopir',
            'email' => 'sopir@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'sopir',
        ]);


        Student::create([
            'user_id' => $siswa->id ?? null,
            'name_student' => 'tes',
            'class_student' => '12 RPL 1',
            'address_student' => 'solo',
            'phone_student' => '08123456789',
        ]);

        Driver::create([ 
            'user_id' =>$sopir->id ?? null,
            'name_driver' => 'tes',
            'birthdate_driver' => '2000-01-01',
            'address_driver' => 'solo',
            'phone_driver' => '08123456789',
            'status_driver' => 'active',
        ]);

        Vehicle::create([
            'license_plate' => 'AB1234CD',
            'name_vehicle' => 'Toyota Avanza',
            'type_vehicle' => 'Car',
            'year_vehicle' => '2020',
        ]);


    }
}
