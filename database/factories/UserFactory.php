<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = ['CUSTOMER', 'ADMIN', 'DRIVER'];
        $stat = ['ACTIVE', 'INACTIVE'];

        return [
            //'email_verified_at' => now(),
            //'name' => $this->faker->name(),
            'fname' => $this->faker->word(16),
            'lname' => $this->faker->word(16),
            'username' => $this->faker->name(),
            'role' => $role[rand(0, 2)],
            'contactNum' => $this->faker->text(11),
            'created_at' => now(),
            'updated_at' => now(),
            'Status' => $stat[rand(0, 1)],
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
