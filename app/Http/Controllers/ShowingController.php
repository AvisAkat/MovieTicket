<?php

namespace App\Http\Controllers;

use App\Mail\TicketSold;
use App\Models\Showing;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ShowingController extends Controller
{

   

    private $validationRules = [
        'movie_id'=> ["required","integer",],
        "price"=> ["required","decimal:0,2","min:1",],
        "rooms"=> ["required","min:2",],
        "limit"=> ["required","min:1","integer",],
        "showing_datetime"=> ["required","date_format:Y-m-d\TH:i","after:now"],

    ];



    private $validationNames = [
        "movie_id" => "Movie Title",
        "price" => "Price",
        "rooms" => "Room",
        "limit" => "Ticket Limit",
        "showing_datetime" => "Showing Date",
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $showings = Showing::active()->orderBy('showing_datetime', 'asc')->get();
        return view('showings.index')->with(['showings' => $showings]);
    }

    public function showingList()
    {
        $showings = Showing::orderBy('created_at', 'desc')->get();
        return view('showings.showingList')->with(['showings' => $showings]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        return view('showings.create')->with(['movies' => $movies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $current_date = now();
        $request->validate($this->validationRules,["showing_datetime.after" => "The Date Must Be Greater Than $current_date"],$this->validationNames);

        

        try{
            Showing::create($request->all());
            return redirect(route('admin.showings.list'))->with(['status' => 'success', 'message' => 'Showing Created Successfully']);

        }
        catch(\Exception $e){
            return redirect(route('admin.showings.list'))->with(['status' => 'danger', 'message' => 'Showing Was Not Created. Try again later']);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showing = Showing::findOrFail($id);

        
        return view('showings.showing')->with(['showing' => $showing]);
        
    }

    public function view(string $id)
    {
        $showing = Showing::findOrFail($id);
       

        
        return view('showings.view')->with(['showing' => $showing]);
        
    }

    // // This function is the same as the top one but here laravel will automatically find the showing from the db.
    // public function show(Showing $showing)
    // {        
    //     return view('showings.showing')->with(['showings' => $showing]);
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movies = Movie::all();
        $showing = Showing::findOrFail($id);
        return view("showings.edit")->with(["showing" => $showing,"movies" => $movies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $current_date = now();
        $request->validate($this->validationRules,["showing_datetime.after" => "The Date And Time Must Be Greater Than $current_date"],$this->validationNames);

        try{
            $showing = Showing::findOrFail($id);

            
                $showing->limit = request('limit');
                $showing->rooms = request('rooms');
                $showing->movie_id = request('movie_id');
                $showing->price = request('price');
                $showing->showing_datetime = request('showing_datetime');

                $showing->save();
            

            
            return redirect()->route('admin.showings.list')->with(['status'=> 'success', 'message'=> "Edited Successfully "]);
        }   
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "Not Edited"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    

        try{
            Showing::destroy($id);
            return redirect()->back()->with(["status" => "success","message" => "Show deleted successfully"]);
        }
        catch (\Throwable $th)
        {
            // the Log is for displaying error in the laravel.log file 
            Log::error('Deleting movie unsuccessful'. $th->getMessage());
            return redirect()->back()->with(["status" => "danger","message" => "Show not deleted"]);
        }
        
        // 

    }
    public function buyTicket(Request $request,Showing $showing)
    {
       
        $maxTicket = $showing->userTicketsAvailable();

        $data = $request->validate([
            'number_of_tickets' => ['required', 'min:1', 'numeric', "max:$maxTicket",],
        ]);

        $ticketsBought = [];

        for ($i = 0; $i < $data['number_of_tickets']; $i++) //loop incase the user purchase more than a single ticket
        {
            //$ticketsBought = $showing->tickets()->create(['user_id' => Auth::user()->id]);
            $ticketsBought = Ticket::create([
                'showing_id' => $showing->id,
                'user_id' => Auth::user()->id,
            ]);

            // // Other ways to create a ticket

        // $showing->tickets()->create(['user_id' => Auth::user()->id]);

        // Auth::user()->tickets()->create(['showing_id' => $showing->id]);

        }

        Mail::to(Auth::user()->email)->send(new TicketSold(Auth::user()->name,collect($ticketsBought)));

        

        
    
        return redirect()->back()->with(['status'=> 'success', 'message'=> 'Purchased Successfully']);

        
    }

    public function getAll() {
        return  Showing::active()->orderBy('showing_datetime', 'asc')->get();
    }
}
