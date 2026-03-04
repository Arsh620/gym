<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration_days',
        'price',
        'status'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
