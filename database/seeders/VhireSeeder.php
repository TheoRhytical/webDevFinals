<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VhireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Vhire::factory()->times(50)->create();
    }
}
