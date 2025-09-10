<?php

namespace Database\Seeders;

use App\Models\contact;
use App\Models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        contact::create([
            'address' => 'Accra',
            'phone' => '0245675432',
            'user_id' => '1',
            
        ]);

        contact::create([
            'address' => 'Kumasi',
            'phone' => '05832453532',
            'user_id' => '2',
            
        ]);
    }
}
