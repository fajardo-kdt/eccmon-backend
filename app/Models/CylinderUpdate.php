<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CylinderUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'process',
        'location',
        'cycle',
        'other_details',
        'date_done',
    ];

    public function cylinder() {
        return $this->belongsTo(CylinderCover::class, 'serial_number', 'serial_number');
    }
}
