<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    protected $fillable = [
        'user_id',
        'name_driver',
        'birthdate_driver',
        'address_driver',
        'phone_driver',
        'status_driver',
    ]; 
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'driver_vehicle', 'driver_id', 'vehicle_id');
    }
}
