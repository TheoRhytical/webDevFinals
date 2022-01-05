<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'route';
    protected $primaryKey = 'routeID';

    protected $fillable = [
        'routeID',
        'O_termID',
        'D_termID',
        'Fare',
        'Trip Duration',
        'Status'
    ];
}
