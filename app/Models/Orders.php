<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerID',
        'tripID',
        'Quantity',
        'Date',
        'AmountDue',
        'Status',
    ];

    protected $table = 'orders';
    protected $primaryKey = 'orderID';
    public $timestamps = false;
}
