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

        .form .enterData select{
            margin-top: 5px;
            border-radius: 4px;
            border-color: rgb(105, 105, 245);
            padding: 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }

        .form .enterData select option{
            margin-top: 5px;
            border-radius: 4px;
            border-color: rgb(105, 105, 245);
            padding: 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            
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
        $movie_id = old('movie_id') ? old('movie_id') : $showing->movie_id;
        $price = old('price') ? old('price') : $showing->price;
        $room = old('rooms') ? old('rooms') : $showing->rooms;
        $limit = old('limit') ? old('limit') : $showing->limit;
        $show_date = old('showing_datetime') ? old('showing_datetime') : $showing->showing_datetime;
      }
    
    
    @endphp
    
    <div class="row mt-5">
        <div class="col-3">
        
        </div>
        
        <div class="form col-6" >
        
        
            <form action="{{$action}}" method="POST">
                @csrf
                @if($active)
                    {{-- spoofing --}}
                    @method('PUT')
                @endif
        
                <div class="enterData mb-3">
                    <label for="movie" class="form-label">Movies</label>
                    <select id="movie" name="movie_id" class="text-capitalize">
                        <option value="">--Select Movie--</option>
                        @foreach ($movies as $movie)
                            <option 
                                @if($active)
                                    @if($movie_id == $movie->id)
                                        selected="selected"
                                    @endif
                                @endif
                                @if(!$active)
                                    @if(old('movie_id') == $movie->id)
                                        selected="selected"
                                    @endif
                                @endif

                                class="text-capitalize"
                                value="{{ $movie->id}}">
                                    {{ $movie->title }}
                            </option>
                        @endforeach

                    </select>


                    @if($errors->has('movie_id'))
                            <div class="alert alert-danger">
                                {{ $errors->first('movie_id') }}
                            </div>
                    @endif
                </div>      

                <div class="row">
                    <div class="col-6">
                        <div class="enterData mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" value="{{ $active? $price:old('price')}}" name="price" placeholder="Price" />
                    
                            @if($errors->has('price'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="enterData mb-3">
                            <label for="room" class="form-label">Room</label>
                            <select id="room" name="rooms">
                                <option value="">--Select Room--</option>
                                @for($i = 1;$i <= 9;$i++)
                                    <option value="R{{$i}}"
                                        @if($active)
                                            @if($room == "R".$i)
                                                selected="selected"
                                            @endif
                                        @endif
                                        @if(!$active)
                                            @if(old('rooms') == "R".$i)
                                                selected="selected"
                                            @endif
                                        @endif
                                    
                                    >R{{$i}}</option>
                                @endfor
        
                            </select>
        
        
                            @if($errors->has('rooms'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('rooms') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="enterData mb-3">
                            <label for="limit" class="form-label">Ticket Limit</label>
                            <input type="number" class="form-control" id="limit" value="{{ $active? $limit:old('limit')}}" name="limit" placeholder="Limit"/>
                    
                            @if($errors->has('limit'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('limit') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="enterData mb-3">
                            <label for="showing_date" class="form-label">Showing Date</label>
                            <input type="datetime-local" class="form-control" id="showing_date" value="{{ $active? $show_date:old('showing_datetime')}}" name="showing_datetime" />
                    
                            @if($errors->has('showing_datetime'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('showing_datetime') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    

                </div>
                
        
            
        
            
        
                <button type="submit" class="btn btn-primary  w-100 mt-4">Submit</button>
            </form>
        </div>

        <div class="col-3">
        
        </div>
    </div>