<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Orders;

class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Orders::class;
    
    public function definition()
    {
        $stat = ['UNCONFIRMED', 'CONFIRMED', 'CANCELLED'];

        return [
            'customerID' => rand(1, 300),
            'tripID' => rand(1, 250),
            'Quantity' => 1,
            'Date' => now() ,
            'AmountDue' => 100,
            'Status' => $stat[rand(0, 2)],
        ];
    }
}
