@extends('masterlayout.master')
    @section('content')


<div class="container mt-5">
    <h1 style="text-align: center;margin-bottom: 50px">{{ $showing->movie->title}}</h1>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card" style="height: 20rem;width: 30rem">
             
             <img src="{{ $showing->movie->poster}}" alt="..." / style="width: 100%;height:100%">
            
          </div>
        </div>
        <div class="col-sm-6">
          <div class="">
            <div class="card-body" style="align-content: center">

                <div class="row"><b>Showing Date:</b>{{ $showing->formatedDate()}}</div>
                <h3 style="text-align: center">Description</h3>
              {{ $showing->movie->description }}
              <p>Tickets Available: {{ $showing->ticketsAvailable()}}</p>
              

              <div class="" style="margin-top: 4rem ">
                {{-- <form action="{{ route('ticket.buy', $showings->id)}}" method="POST"> --}}
                <form action="{{ route('ticket.buy', ['showing' => $showing->id])}}" method="POST">
                  
                  @csrf
                    <label for="NoTick">Number Of Tickets: </label>
                    <input type="number" value="1" id="NoTick" name="number_of_tickets"/>
                    
                    <a href="#"><button>Buy</button></a>
                    @if($errors->has('number_of_tickets'))
                        <div class="alert alert-danger">
                            {{ $errors->first('number_of_tickets') }}
                        </div>
                    @endif
                </form>
            </div>
            </div>
          </div>
        </div>
    </div>
    
    

    <div class="" style="margin-top: 5rem;text-align:center ">
        <h2>Other Showings for {{ $showing->movie->title}}</h2>
        <ul class="list-group list-group-flush">
            @foreach($showing->otherShowings() as $otherShowings)
                <li class="list-group-item">{{ $otherShowings->formatedDate()}}</li>
                <form>
                    <label for="NoTick">Number Of Tickets: </label>
                    <input type="number" name="" id="NoTick" />
                    <a href="#"><button>Buy</button></a>
                </form>
            
            @endforeach
          </ul>
            
          
    </div>
</div>


@endsection