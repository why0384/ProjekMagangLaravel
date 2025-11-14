<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'student_id',
        'driver_id',
        'vehicle_id',
        'pickup_time',
        'dropoff_time',
        'pickup_location',
        'dropoff_location',
        'status_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
