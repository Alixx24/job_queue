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
        
           @if(auth()->user()->hasPermissionTo('تماشا انبار'))
            <a class="nav-item nav-link" href="{{ route('panel.post') }}">Posts</a>
           
            <a class="nav-item nav-link" href="{{ route('panel.post.create') }}">Make post</a>
            @endif
            <a class="nav-item nav-link disabled" href="#">Disabled</a>
            
        </div>
    </div>
</nav>