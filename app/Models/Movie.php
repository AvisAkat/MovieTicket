<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Movie extends Model
{
 
    use HasFactory;

    protected $fillable = [
        "title", 'poster', 'description', 'genre',
    ];

    protected $appends = ['poster'];

    public function showings()
    {
        return $this->hasMany(Showing::class);

        //in case you used your own foreign key then you have to specify the foreign key by default it is the className_id
        //return $this->hasMany(Showing::class,'MoviesID');
    }

    public function activeShowings()
    {
        return $this->showings()->where('showing_datetime', '>', now())->get();

    }

    public function numberOfShowings()
    {
        return $this->showings->where('movie_id', '==' , $this->id)->count();
    }

    public function numberOfActiveShowings()
    {
        return $this->activeShowings()->where('movie_id', '==' , $this->id)->count();
    }

    public function getMovieURL()
    {
        if(Str::contains($this->poster, "https"))
        {
            return $this->poster;
        }
        else{
            return Storage::disk('images')->url($this->poster);
        }
    }

    protected function poster(): Attribute {
        return Attribute::make(
            get: fn ($path, array $attributes) => Str::contains($attributes['poster'], "https") ? $attributes['poster'] : Storage::disk('images')->url($attributes['poster']) ,
        );
    }
}
