<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vhire;

class VhireFactory extends Factory
{
    protected $model = Vhire::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $stat = ['ACTIVE', 'INACTIVE'];
        return [
            'driverID' => rand(1, 200),
            'PlateNum' => 'ABC1234',
            'Brand' => $this->faker->text(10),
            'Model' => $this->faker->text(10),
            'Color' => $this->faker->text(10),
            'Capacity' => 16,
            'Status' => $stat[rand(0, 1)]
        ];
    }
}
