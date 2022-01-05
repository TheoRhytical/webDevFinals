<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Route::factory()->times(5)->create();
    }
}
