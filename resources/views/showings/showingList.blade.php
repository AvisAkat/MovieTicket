@extends('masterlayout.master')

@section('title', "All Showings")



@section('content')
    
    <div class="">
        <h1 class="text-center mb-5">Showings</h1>

        <a class="btn btn-success" href="{{ route('admin.showings.create')}}" style="margin-bottom: 4rem">Add Showing</a>
        
        <table class="table table-striped table-hover text-center">
            <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Movie</th>
                <th>Price</th>
                <th>Limit</th>
                <th>Tickets Bought</th>
                <th>Showing Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody style="margin-top: 20px">
                @foreach($showings as $showing)
                    <tr>
                        <th>{{ $showing->id }}</th>
                        <td class="text-capitalize">{{ $showing->movie->title }}</td>
                        <td>{{ $showing->price }}</td>
                        <td>{{ $showing->limit }}</td>
                        <td>{{ $showing->no_ticketsBought() }}</td>
                        <td>{{ $showing->formatedDate() }}</td>
                        <td>{{ $showing->showingStatus() }}</td>
                        <td style="display: flex">
                            <div class="me-2">
                                <a class="btn btn-info" href="{{ route('admin.showings.view', ['showing' => $showing->id])}}">View</a>    
                            </div>
                            <div class="me-2">
                                <a class="btn btn-primary" href="{{ route('admin.showings.edit', ['showing' => $showing->id])}}">Edit</a>
                            </div>
                            <div class="me-2">
                                <form action="{{ route('admin.showings.destroy', ['showing' => $showing->id])}}" method="POST">
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