<!-- top-navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="/welcome">WareHouse</a>
  <!-- button for mobile mode -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">

      <!-- if logged in -->
      @if(Auth::check())
      <li class="nav-item"><a class="nav-link top-navbar-item" href="/home">Home</a>
      <li class="nav-item"><a class="nav-link top-navbar-item" href="/projects">Projects</a>
      <li class="nav-item"><a class="nav-link top-navbar-item" href="/organization">Organization</a>
      @endif

      <!-- if guest -->
      @if(!Auth::check())
      <li class="nav-item"><a class="nav-link top-navbar-item" href="/projects/public">Projects</a>
      <li class="nav-item"><a class="nav-link top-navbar-item" href="/contact">Contact Us</a>
      @endif

      <!-- if user is an admin -->
      @if(!empty(auth()->user()->admin))
      <li class="nav-item"><a class="nav-link top-navbar-item" href="/admin">Dashboard</a>
      @endif
      
    </ul>

    <!-- login/register -->
    <ul class="navbar-nav mr-right">
      @guest
        <li class="nav-item"><a class="nav-link top-navbar-item" href="{{ route('login') }}">Login</a>
        <li class="nav-item"><a class="nav-link top-navbar-item" href="{{ route('register') }}">Register</a>
      @else
        <!-- messages -->
        <li class="nav-item"><a class="nav-link top-navbar-item" href="/messages"><i class="material-icons md-18 material-icons-mid">email</i></a>
        <!-- notifications -->
        <li class="nav-item"><a class="nav-link top-navbar-item" href="/notifications"><i class="material-icons md-18 material-icons-mid">notifications</i></a>
        <li class="nav-item dropdown show">
          <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ auth()->user()->first_name }}</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/account">Account</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          </div>
      @endguest
        <li class="nav-item">
          <!-- search -->
          <form class="form-inline mt-2 mt-md-0" action="/search">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              <i class="material-icons md-18 material-icons-mid">search</i>
            </button>
          </form>
    </ul>

  </div>
</nav>