<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;
use App\Models\Route;

class TripFactory extends Factory
{
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $route = Route::select('routeID')->get();
        $stat = ['OPEN', 'CLOSED', 'ARRIVED', 'DELETED'];

        return [
            'vehicleID' => rand(1, 50),
            'routeID' => $route[rand(0, 4)]->routeID,
            'FreeSeats' => 16,
            'ETD' => '8:00',
            'ETA' => '8:45',
            'Status' => $stat[rand(0, 3)]
        ];
    }
}
