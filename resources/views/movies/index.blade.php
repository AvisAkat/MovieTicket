@extends('masterlayout.master')
@section('content')

    
    
    
    <div class="">
        <h1 class="text-center mb-5">Movies</h1>

        <a class="btn btn-success" href="{{ route('admin.movies.create')}}" style="margin-bottom: 4rem ">Add Movie</a>
        
        <table class="table table-striped table-hover">
            <thead class="table-primary">
              <tr>
                <th>Id</th>
                <th>Poster</th>
                <th>Title</th>
                <th>Genre</th>
                <th></th>
                
              </tr>
            </thead>
            <tbody style="margin-top: 20px">
                @foreach($movies as $movie)
                    <tr>
                        <th>{{ $movie->id }}</th>
                        <td><img src="{{ $movie->getMovieURL() }}" style="width: 80px;height: 80px;" /></td>
                        <td class="text-capitalize">{{ $movie->title }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td style="display: flex">
                            <div class="me-2">
                                <a class="btn btn-info" href="{{ route('admin.movies.show', ['movie' => $movie->id])}}">View</a>
                                {{-- <a class="btn btn-danger" href="{{ route('movies.destroy', ['movie' => $movie->id])}}">Delete</a> --}}
                            </div>
                            <div class="me-2">
                                <a class="btn btn-primary" href="{{ route('admin.movies.edit', ['movie' => $movie->id])}}">Edit</a>
                            </div>
                            <div class="me-2">
                                <form action="{{ route('admin.movies.destroy', ['movie' => $movie->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
             
             
            </tbody>
          </table>
    </div>


@endsection