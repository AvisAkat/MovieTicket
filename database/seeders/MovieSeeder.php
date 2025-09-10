<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        movie::create([
            'title' => 'Avatar',
            'genre' => 'Action, Adventure, Fantasy',
            'description' => 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjEyOTYyMzUxNl5BMl5BanBnXkFtZTcwNTg0MTUzNA@@._V1_SX1500_CR0,0,1500,999_AL_.jpg',
        ]);

        movie::create([
            'title' => '300',
            'genre' => 'Action, Drama, Fantasy',
            'description' => 'King Leonidas of Sparta and a force of 300 men fight the Persians at Thermopylae in 480 B.C.',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTMwNTg5MzMwMV5BMl5BanBnXkFtZTcwMzA2NTIyMw@@._V1_SX1777_CR0,0,1777,937_AL_.jpg',
        ]);

        movie::create([
            'title' => 'Narcos',
            'genre' => 'Biography, Crime, Drama',
            'description' => 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar.',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTk2MDMzMTc0MF5BMl5BanBnXkFtZTgwMTAyMzA1OTE@._V1_SX1500_CR0,0,1500,999_AL_.jpg',
        ]);

        movie::create([
            'title' => 'Breaking Bad',
            'genre' => 'Crime, Drama, Thriller',
            'description' => 'A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his familys financial future.',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTgyMzI5NDc5Nl5BMl5BanBnXkFtZTgwMjM0MTI2MDE@._V1_SY1000_CR0,0,1498,1000_AL_.jpg',
        ]);

        movie::create([
            'title' => 'Rogue One: A Star Wars Story',
            'genre' => 'Action, Adventure, Sci-Fi',
            'description' => 'The Rebellion makes a risky move to steal the plans to the Death Star, setting up the epic saga to follow.',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjE3MzA4Nzk3NV5BMl5BanBnXkFtZTgwNjAxMTc1ODE@._V1_SX1777_CR0,0,1777,744_AL_.jpg',
        ]);
    }
}
