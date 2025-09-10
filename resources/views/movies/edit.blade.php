@extends('masterlayout.master')

@section('title', "Edit Movie")



@section('content')

    <h1 class="text-center mb-5">Edit Movie</h1>
    
    @component('movies.component.form', [ 'action' => route('admin.movies.update', ['movie' => $movie->id]), 'movie' => $movie, 'active' => true])
    @endcomponent    
    

@endsection