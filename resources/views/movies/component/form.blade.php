<style>

.form{
        /* border: .5px solid blue; */
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      padding: 50px;
      border: 1px solid rgb(251, 251, 251);
      box-shadow: 0px 0px 10px 38px rgb(243, 243, 243);
        
    }

    .form .enterData{
        margin-bottom: 15px;
        text-align: left;        
        display: grid;
        
    }

    .form .enterData label{
        color: blue;
    }

    .form .enterData input{
        margin-top: 5px;
        border-radius: 4px;
        border-color: rgb(105, 105, 245);
        padding: 5px;
        
    }

    .form .enterData textarea{
        margin-top: 5px;
        border-radius: 4px;
        border-color: rgb(105, 105, 245);
        padding: 5px;
        
    }

    .form .enterData .alert{
        margin-top: 5px;
        padding: 5px;
        text-align: center;
    }

    .form h1{
        color: blue;
        margin-bottom: 25px;
        
    }

    .form .butt{
        border: 2px solid blue;
        width: 100%;
        border-radius: 5px;
        background-color: rgb(140, 140, 244);
        color: blue;
        margin-top: 30px;
        text-align: center;
        padding: 3px;

    }

</style>

@php

  if($active)
  {
    $title = old('title') ? old('title') : $movie->title;
    $genre = old('genre') ? old('genre') : $movie->genre;
    $description = old('title') ? old('description') : $movie->description;
  }


@endphp

<div class="row mt-5">
  <div class="col-3">

  </div>

  <div class="form col-6">

  
    <form action="{{$action}}" method="POST" enctype="multipart/form-data">
      @csrf
      @if($active)
        {{-- spoofing --}}
        @method('PUT')
      @endif

      <div class="enterData mb-3">
        <label for="movieTitle" class="form-label">Movie Title</label>
        <input type="text" class="form-control" id="movieTtile" value="{{ $active? $title:old('title')}}" name="title" />

        @if($errors->has('title'))
                <div class="alert alert-danger">
                    {{ $errors->first('title') }}
                </div>
        @endif
      </div>
      
      <div class="enterData mb-3">
        <label for="movieGenre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="movieGenre" value="{{ $active? $genre:old('genre')}}" name="genre" />

        @if($errors->has('genre'))
          <div class="alert alert-danger">
            {{ $errors->first('genre') }}
          </div>
        @endif
      </div>


      <div class="enterData mb-3">
        <label for="movieDescription" class="form-label">Description</label>
        <textarea type="text" class="form-control" id="movieDescription" name="description" style="height: 90px;" >{{ $active? $description:old('description')}}</textarea>

        @if($errors->has('description'))
          <div class="alert alert-danger">
            {{ $errors->first('description') }}
          </div>
        @endif
      </div>
      <div class="row">
        <div class="enterData mb-3 @if($active)col-9 @endif">
          <label for="moviePoster" class="form-label">Poster</label>
          <input type="file" class="form-control" id="moviePoster" value="{{ $active? $movie->poster:old('poster')}}" name="poster" />
  
          @if($errors->has('poster'))
            <div class="alert alert-danger">
                {{ $errors->first('poster') }}
            </div>
          @endif
        </div>
        @if($active)
          <div class="enterData mb-3 col-3">
            <img src="{{ $movie->getMovieURL() }}" style="width: 80px;height: 80px" /> 
          </div>
        @endif
           

      </div>

      

      <button type="submit" class="btn btn-primary  w-100 mt-4">Submit</button>
    </form>
  </div>
  <div class="col-3">

  </div>
</div>