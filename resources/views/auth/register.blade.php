
@extends('masterlayout.master')
@section('title',  $active? "Sign Up" : "Sign In")

@section('content')

<style>
    .formContainer{
        text-align: center;
        padding: 30px;
        align-content: center;
        /* margin-left: 20rem; */
        justify-content: center;
        align-items: center;

    }

    .form{
        border: 2px solid blue;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        padding: 30px;
        box-shadow: 0px 0px 10px 30px rgb(105, 105, 245);
        width: 20rem;
    }

    .form .enterData{
        margin-bottom: 15px;
        text-align: left;        
        display: grid;
        
    }

    .form .dataOp{
        text-align: left;
        margin-top: 10px
    }

    .form .enterData div{
        margin-bottom: 4px;
    }

    .form .enterData label{
        color: rgb(105, 105, 245);
    }

    .form .enterData input{
        margin-top: 5px;
        border-radius: 4px;
        border-color: rgb(105, 105, 245);
        padding: 5px;
        color: blue;
    }

    .form .enterData select{
        margin-top: 5px;
        border-radius: 4px;
        border: 2px solid rgb(105, 105, 245);
        padding: 6px;
        color: blue;
    }

    .form h1{
        color:rgb(105, 105, 245);
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

    .form .enterData .alert{
        margin-top: 5px;
        padding: 5px;
        text-align: center;
    }

</style>



    <div class="formContainer row">
        <div class="col-4">

        </div>
        
        <div class="col-4">

            
            <form class="form" action="{{ $active? route('auth.register'): route('auth.loginUser') }}"  method="POST">
                @csrf
                <h1>{{ $active? "Sign Up" : "Sign In"}}</h1>            

                @if($active)
                    <div class="enterData">
                        <label for="RegName">Name</label>
                        <input type="text" id="RegName" name="name" placeholder="Enter your name" value="{{ old('name')}}"/>
                        
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        
                    </div>
                @endif

                <div class="enterData">
                    <label for="RegEmail">Email</label>
                    <input type="email" id="RegEmail" name="email" placeholder="email@example.com" value="{{ old('email')}}"/>

                    @if($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                    @endif
                </div>

                <div class="enterData">
                    <label for="RegPass">Password</label>
                    <input type="password" id="RegPass" name="password" placeholder="**************" value="{{ old('password')}}"/>

                    @if($errors->has('password'))
                            <div class="alert alert-danger">
                                {{ $errors->first('password') }}
                            </div>
                    @endif

                </div>

                @if($active)
                <div class="enterData">
                    <label for="RegCpass">Confirm Password</label>
                    <input type="password" id="RegCpass" name="password_confirmation" placeholder="**************" value="{{ old('password_confirmation')}}"/>

                    @if($errors->has('confirmPassword'))
                            <div class="alert alert-danger">
                                {{ $errors->first('confirmPassword') }}
                            </div>
                    @endif

                </div>
                @endif

            

                <div class="dataOp">
                    @if($active)
                        <div>Already have an account? <a href="{{route('auth.login')}}"> Sign In</a></div>
                    @endif

                    @if(!$active)
                        <div><a href="#">Forgot Password?</a></div>
                    @endif

                    @if(!$active)
                        <div>Don't have an account? <a href="{{route('auth.signup')}}"> Sign Up</a></div>
                    @endif
                </div>

                <div>
                    <button class="butt" type="submit">{{ $active? "Sign Up" : "Sign In" }}</button>

                </div>

            </form>
        </div>
        <div class="col-4">

        </div>
        

    <div>


@endsection