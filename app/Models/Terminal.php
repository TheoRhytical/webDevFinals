<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'terminal';
    protected $primaryKey = 'terminalID';

    protected $fillable = [
        'terminalID',
        'adminID',
        'Location_Name',
        'City'
    ];
}
