

<div class="card m-3" style="width: 18rem;">
  <img src="{{$showing->movie->getMovieURL()}}" class="card-img-top " alt="..." style="height: 12rem;">
  <div class="card-body">
    <h5 class="card-title text-center text-capitalize">{{$showing->movie->title}}</h5>
    <p><b>ShowTime:</b> {{$showing->formatedDate()}}</p>
    <p class="card-text">{{$showing->movie->description}}</p>
    <a href="{{route('admin.showings.show', ['showing' => $showing->id])}}" class="btn btn-primary">Buy Ticket {{$showing->price}}</a>
  </div>
  
</div>
