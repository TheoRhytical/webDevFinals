<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Terminal;

class TerminalFactory extends Factory
{
    protected $model = Terminal::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'terminalID' => $this->faker->unique()->text(5),
            'adminID' => rand(1, 300),
            'Location_Name' => $this->faker->text(24),
            'City' => $this->faker->text(12)
        ];
    }
}
