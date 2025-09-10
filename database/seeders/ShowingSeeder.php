<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Showing;
use App\Models\Movie;

class ShowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Movies = Movie::all();

        foreach ($Movies as $Movie){
            $date = now();
            $date->minute = 0;
            $date->second = 0;

            for ($i = 0; $i < 5; $i++){
                $date = $date->addDay();
                $date->hour = fake()->randomElement([9, 12, 17, 19]);

                Showing::create([
                    'movie_id' => $Movie->id,
                    'showing_datetime' => $date,
                    'price' => fake()->randomDigitNotNull() * 10,
                    'rooms' => fake()->randomDigitNotNull(),
                    'limit' => fake()->randomElement([30, 50, 100, 150])
            
                ]);
            }
        }


    




        
        
    }
}
