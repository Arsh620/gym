<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'purchase_date',
        'maintenance_date',
        'status'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'maintenance_date' => 'date',
    ];
}
