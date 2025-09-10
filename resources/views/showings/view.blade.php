@extends('masterlayout.master')

@section('title', "Showing")



@section('content')


    <h1 class="text-center fs-1 mb-5 text-capitalize" style="font-size: 100px;">{{ $showing->movie->title }}</h1>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0" >
          <div class="card" style="height: 20rem;">
            
                <img src="{{ $showing->movie->getMovieURL()}}" alt="..."  style="height:100%;width: 100%" />
            
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card border border-0">
                <div class="card-body">
                    <div class="movieDescription mb-4">
                        <h5 class="card-title fs-4 fw-bold text-center">Description</h5>
                        {{ $showing->movie->description }}
                    </div>
                      
                
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <div class="row">

            @component('showings.component.viewCard', [ 'title' => 'show status','content' => $showing->showingStatus() ])
            @endcomponent

            @component('showings.component.viewCard', [ 'title' => 'price of ticket','content' => 'GHc '.$showing->price.'.00' ])
            @endcomponent
            
            @component('showings.component.viewCard', [ 'title' => 'showing date','content' => $showing->formatedDate() ])
            @endcomponent

            @component('showings.component.viewCard', [ 'title' => 'total number of tickests','content' => $showing->limit ])
            @endcomponent

            @component('showings.component.viewCard', [ 'title' => 'number of tickets bought','content' => $showing->no_ticketsBought() ])
            @endcomponent

            @component('showings.component.viewCard', [ 'title' => 'number of tickets left','content' => $showing->ticketsAvailable() ])
            @endcomponent

            @component('showings.component.viewCard', [ 'title' => 'total amount','content' => 'GHc '.$showing->totalAmount().'.00' ])
            @endcomponent

            @component('showings.component.viewCard', [ 'title' => 'showing room','content' => $showing->rooms ])
            @endcomponent
        </div>
    </div>

   
    

@endsection