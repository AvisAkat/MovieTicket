<nav  class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Movie Ticket</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>

        </ul>       
        <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto" >
          
          @auth

            
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.movies.index')}}">Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.showings.list')}}">Showings</a>
              </li>
            
            <li class="nav-item">
              <a class="nav-link active" href=""><i class="bi bi-person-circle"></i> Welcome, {{ Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
              <form action="{{route('auth.logout')}}" method="POST">
                @csrf
                <button class="btn" type="submit" ><i class="bi bi-door-closed"></i></a>
              </form>
            </li>

            

          @endauth

          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{route('auth.login')}}">Log In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('auth.signup')}}">Sign UP</a>
            </li>
            
          @endguest
         
        </ul>    
      </div>
    
    </div>
  </nav>