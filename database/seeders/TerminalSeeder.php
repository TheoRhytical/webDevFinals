<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terminal;

class TerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummy = [
            [
                'terminalID' => 'AYLA',
                'adminID' => rand(1, 300),
                'Location_Name' => 'Ayala Center Cebu',
                'City' => 'Cebu City'
            ],
            [
                'terminalID' => 'CLNK',
                'adminID' => rand(1, 300),
                'Location_Name' => 'Cebu City Link Terminal',
                'City' => 'Cebu City'
            ],
            [
                'terminalID' => 'SMCC',
                'adminID' => rand(1, 300),
                'Location_Name' => 'SM City Cebu',
                'City' => 'Cebu City'
            ],
            [
                'terminalID' => 'SMSC',
                'adminID' => rand(1, 300),
                'Location_Name' => 'SM Seaside City',
                'City' => 'Cebu City'
            ],
            [
                'terminalID' => 'CITP',
                'adminID' => rand(1, 300),
                'Location_Name' => 'Cebu IT Park',
                'City' => 'Cebu City'
            ],
        ];

        Terminal::insert($dummy);
    }
}
