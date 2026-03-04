<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_class_id',
        'member_id',
        'booking_date',
        'status'
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function gymClass()
    {
        return $this->belongsTo(GymClass::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
