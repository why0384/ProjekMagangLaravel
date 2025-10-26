<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'license_plate',
        'name_vehicle',
        'type_vehicle',
        'year_vehicle',
    ];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'driver_vehicle', 'vehicle_id', 'driver_id');
    }
}
 