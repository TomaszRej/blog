<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="{{Request::is('/') ? 'nav-item active' : 'nav-item'}}">
              <a class="nav-link" href="/">Home </a>
            </li>
            <li class=" {{Request::is('about') ? 'nav-item active' : 'nav-item'}}">
              <a class="nav-link" href="/about">About </a>
            </li>

            <li class="{{Request::is('contact') ? 'nav-item active' : 'nav-item'}}">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="{{Request::is('contact') ? 'nav-item active' : 'nav-item'}}">
                <a class="nav-link" href="blog">Blog</a>
              </li>
          </ul>
          <ul class="navbar-nav ">
              @if(Auth::check())
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi {{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
                  <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                  </div>
                </li>
                @else

              <a href="{{route('login')}}" class="btn btn-default">Login</a>
              @endif

          </ul>
        </div>
        
       
    </nav>