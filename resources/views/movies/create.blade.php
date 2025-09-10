@extends('masterlayout.master')

@section('title', "Create a Movie")



@section('content')
    

    <h1 class="text-center mb-5" >Create a Movie</h1>

    
    @component('movies.component.form', [ 'action' => route('admin.movies.store'),'active' => false])
    @endcomponent    
    

@endsection