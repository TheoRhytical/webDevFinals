<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vhire extends Model
{
    use HasFactory;

    protected $table = 'vhire';
    protected $primaryKey = 'vehicleID';

    protected $fillable = [
        'driverID',
        'PlateNum',
        'Brand',
        'Model',
        'Color',
        'Capacity',
        'Status'
    ];
}
