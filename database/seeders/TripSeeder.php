<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Trip::factory()->times(250)->create();
    }
}
