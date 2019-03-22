<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container ">
    <a class="navbar-brand" href="{{route('home')}}">Weibo App</a>
    <ul class="navbar-nav justify-content-end">
      @if(Auth::check())
        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Users List</a></li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="{{ route('users.show', Auth::user()) }}" class="dropdown-item">My account</a>
            <a href="{{ route('users.edit', Auth::user()) }}" class="dropdown-item">Edit More</a>
            <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item" id="logout">
                <form action="{{ route('logout')}}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-block btn-danger" type="submit" name="button">logout</button>
                </form>
              </a>

          </div>
        </li>
      @else
        <li class="nav-item"><a class="nav-link" href="{{route('help')}}">Help</a></li>
      <li class="nav-item" ><a class="nav-link" href="{{route('login')}}">Login</a></li>
      @endif

    </ul>
  </div>
</nav>
