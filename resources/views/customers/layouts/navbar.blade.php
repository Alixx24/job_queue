<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
    </head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ route('home.customer') }}">Go to Web!</a>
                <a class="nav-item nav-link active" href="{{ route('panel') }}">Home Panel</a>
              
                @auth
                                    <a href="{{ route('user.logout') }}" class="btn btn-success">Log Out?</a>
                                    <a href="{{ route('user.profile') }}" class="btn btn-primary">profile</a>


                @endauth
               
               @if(!auth()->user())
               <a href="{{ route('login') }}" class="btn btn-success">Login?</a>
               <a href="{{ route('users') }}" class="btn btn-danger">register?</a>

               @endif
                
            </div>
        </div>
    </nav>