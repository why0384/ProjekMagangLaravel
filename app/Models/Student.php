<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{ 
    protected $fillable = [
        'user_id',
        'name_student',
        'class_student',
        'address_student',
        'phone_student',
        'service_student',
        'status_student',
        'photo_student',
    ];
    //Relasi

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
