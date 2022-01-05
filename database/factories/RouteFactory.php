<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Route;
use App\Models\Terminal;

class RouteFactory extends Factory
{
    protected $model = Route::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $term = Terminal::select('terminalID')->get();

        $o_term = $term[rand(0, 4)]->terminalID;
        $d_term = $term[rand(0, 4)]->terminalID;

        $stat = ['ACTIVE', 'INACTIVE'];
        return [
            'routeID' => $o_term.'-'.$d_term,
            'O_termID' => $o_term,
            'D_termID' => $d_term,
            'Fare' => 100,
            'Trip Duration' => '0:45:00',
            'Status' => $stat[rand(0, 1)]
        ];
    }
}
