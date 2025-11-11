<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RideRequest extends Model
{
    // Nama tabel jika tidak default 'requests'
    protected $table = 'ride_requests';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'student_id',
        'driver_id',
        'vehicle_id',
        'pickup_location',
        'status',
        'queue_number',
    ];

    /**
     * Relasi ke Student
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Relasi ke Driver
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    /**
     * Relasi ke Vehicle
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
