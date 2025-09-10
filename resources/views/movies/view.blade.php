@extends('masterlayout.master')

@section('title', "Show a Movie")



@section('content')

    <h1 class="text-center fs-1 mb-5 text-capitalize" style="">{{ $movie->title }}</h1>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            
                <img src="{{ $movie->getMovieURL()}}" alt="..."  style="height:100%;width: 100%" />
            
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card border border-0">
            <div class="card-body">
                <div class="movieGenre mb-4">
                    <h5 class="card-title fs-4 fw-bold">Genre</h5>
                    {{ $movie->genre }}
                </div>
                <div class="movieDescription mb-4">
                    <h5 class="card-title fs-4 fw-bold">Description</h5>
                    {{ $movie->description }}
                </div>
                <div class="movieShowing mb-3">
                    <div class="mb-3">
                        <span class="card-title fs-5 fw-bold">Total Number Of Shows: </span>{{ $movie->numberOfShowings() }}
                    </div>
                    <div class="mb-3">
                        <span class="card-title fs-5 fw-bold">Total Number Of Active Shows: </span>{{ $movie->numberOfActiveShowings() }}
                    </div>
                
                </div>              
              
            </div>
          </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-6 mb-3 mb-sm-0 text-center">
            <a class="btn btn-primary w-100 me-3 ms-2 text-center" href="{{ route('admin.movies.edit', ['movie' => $movie->id])}}">Edit</a>
        </div>
        <div class="col-sm-6 text-center">
            <form action="{{ route('admin.movies.destroy', ['movie' => $movie->id])}}" method="POST">
                @method('DELETE')
                @csrf

                <button class="btn btn-danger w-100 me-2 ms-3 text-center " type="submit">Delete</button>
            </form>
          
        </div>
    </div>

   
    

@endsection