<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{ 
    protected $fillable = [
        'student_id',
        'driver_id',
        'vehicle_id',
        'pickup_time',
        'dropoff_time',
        'pickup_location',
        'dropoff_location',
        'note_admin',
        'status_id',
        'last_update',
    ];

    // Relasi ke tabel lain
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }


}
