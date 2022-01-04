<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trip';
    protected $primaryKey = 'tripID';

    protected $fillable = [
        'vehicleID',
        'routeID',
        'FreeSeats',
        'ETD',
        'ETA',
        'Status'
    ];
}
