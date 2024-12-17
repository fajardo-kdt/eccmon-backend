<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CylinderCover extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'is_disposed',
        'disposal_date',
        'status',
        'location',
        'case',
        'cycle',
    ];

    public function updates() {
        return $this->hasOne(CylinderUpdate::class, 'serial_number', 'serial_number');
    }
}
