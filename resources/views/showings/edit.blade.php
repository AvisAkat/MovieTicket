@extends('masterlayout.master')

@section('title', "Edit Showing")



@section('content')

    <h1 class="text-center mb-5">Edit Show</h1>
    
    @component('showings.component.form', [ 'action' => route('admin.showings.update', ['showing' => $showing->id]), 'showing' => $showing, 'movies' => $movies ,'active' => true])
    @endcomponent    
    

@endsection