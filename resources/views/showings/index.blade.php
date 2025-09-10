@extends('masterlayout.master')
@section('content')

    
    
    
    <div class="d-flex flex-wrap">
        @foreach($showings as $showing)
            @component('showings.component.showing-card', ['showing' => $showing])
            @endcomponent
        @endforeach
    </div>


@endsection