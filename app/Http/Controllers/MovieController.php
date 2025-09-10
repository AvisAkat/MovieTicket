<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{

    private $validationRules = [
        'title'=> ["required",],
        "description"=> ["required","min:10","max:255"],
        "genre"=> ["required","min:3","max:255"],
        "poster"=> ["max:1024","image"],

    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validationRules["poster"][] = "required";
        $data = $request->validate($this->validationRules);


        //first array is the rules

        // $data = $request->validate([
        //     'title'=> ["required",],
        //     "description"=> ["required","min:10","max:255"],
        //     "genre"=> ["required","min:3","max:255"],
        //     "poster"=> ["required","max:1024","image"],
        // ],
        // [
        //     //second array is the custom error message sent to the user
        //     "poster.required" => "You need to provide a movie poster",
        // ],[
        //     //third array is changing the attribute names
        //     "title" => "Movie Title"
        // ]
        // );

        $posterImage = $request->file("poster");

        try{
            // movies = the folder name where it will store
            // images = the name of the disk in filesystem.php
            $path = $posterImage->store("movies", 'images');

            //sending the movie to the database
            $movie = new Movie();
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            $movie->poster = $path;
            $movie->genre = $data['genre'];
            $movie->save();

            //sending the movie to the database
            // Movie::create([
            //     'title' => request('title'),
            //     'description'=> request('description'),
            //     'genre' => request('genre'),
            //     'poster' => $path,
            // ]);

            return redirect()->route('admin.movies.index')->with(['status'=> 'success', 'message'=> "$movie->title Added Successfully "]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "$movie->title Not Added"]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        return view("movies.view")->with("movie", $movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        return view("movies.edit")->with("movie", $movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validationRules["poster"][] = "nullable";
        $data = $request->validate($this->validationRules);

       

        // $data = $request->validate([
        //     'title'=> ["required",],
        //     "description"=> ["required","min:10","max:255"],
        //     "genre"=> ["required","min:3","max:255"],
        //     "poster"=> ["nullable","max:1024","image"],
        // ]);

        

        try{
            // movies = the folder name where it will store
            // images = the name of the disk in filesystem.php
            

            //sending the movie to the database
            $movie = Movie::findOrFail($id);
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            if($request->hasFile('poster'))
            {
                $posterImage = $request->file("poster");
                $path = $posterImage->store("movies", 'images');
                $movie->poster = $path;

            }

            
            $movie->genre = $data['genre'];
            $movie->save();

            //sending the movie to the database
            // Movie::create([
            //     'title' => request('title'),
            //     'description'=> request('description'),
            //     'genre' => request('genre'),
            //     'poster' => $path,
            // ]);

            return redirect()->route('admin.movies.index')->with(['status'=> 'success', 'message'=> "$movie->title Edited Successfully "]);
        }   
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "$movie->title Not Edited"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        try{
            $movie->delete();
            return redirect()->back()->with(["status" => "success","message" => "Movie deleted successfully"]);
        }
        catch (\Throwable $th)
        {
            // the Log is for displaying error in the laravel.log file 
            Log::error('Deleting movie unsuccessful'. $th->getMessage());
            return redirect()->back()->with(["status" => "danger","message" => "Movie not deleted"]);
        }
        
        // Movie::destroy($id);

        
    }
}
