<?php

namespace App\Models;

//use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Showing extends Model
{
    use HasFactory;

    protected $with = ['movie', 'tickets'];
    protected $fillable = [
        "movie_id", 'price', 'rooms', 'limit', 'showing_datetime',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function formatedDate()
    {
        return Carbon::parse($this->showing_datetime)->toDayDateTimeString();
    }

    public function formattedTime() {
        return  Carbon::parse($this->showing_datetime)->format('h A');
    }

    public function scopeActive(Builder $query)
    {
        $query->where('showing_datetime', '>', now());
    }

    public function otherShowings()
    {
        return $this->movie->activeShowings()->where('id', '<>' ,$this->id);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    public function ticketsPurchased()
    {
        return $this->tickets()->count();
    }

    public function userTicketsPurchased()
    {
        return $this->tickets->where('user_id','==', Auth::user()->id)->count();
    }

    public function userTicketsAvailable()
    {
        return 10 - $this->userTicketsPurchased();
    }

    public function ticketsAvailable()
    {
        return $this->limit - $this->ticketsPurchased();
    }

    public function no_ticketsBought()
    {
        return $this->tickets->where('showing_id', '==', $this->id)->count();
    }

    public function totalAmount()
    {
        return $this->price * $this->no_ticketsBought();
    }

    public function showingStatus()
    {
        if($this->showing_datetime > now())
        {
            return "Active";
        }
        else
        {
            return "Not Active";
        }
    }


    
}
