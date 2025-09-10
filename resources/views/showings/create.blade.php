@extends('masterlayout.master')

@section('title', "Add Show")



@section('content')
    

    <h1 class="text-center mb-5" style="color: rgb(140, 140, 244)" >Add Show</h1>

    
    @component('showings.component.form', [ 'action' => route('admin.showings.store'),'movies' => $movies,'active' => false])
    @endcomponent    
    

@endsection