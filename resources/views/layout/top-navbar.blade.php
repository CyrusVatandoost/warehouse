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
      <li class="nav-item"><a class="nav-link" href="/home">Home</a>
      <li class="nav-item"><a class="nav-link" href="/projects">Projects</a>
      <li class="nav-item"><a class="nav-link" href="/organization">Organization</a>
      <li class="nav-item"><a class="nav-link" href="/messages">Messages</a>
      @endif

      <!-- if guest -->
      @if(!Auth::check())
      <li class="nav-item"><a class="nav-link" href="/projects">Projects</a>
      <li class="nav-item"><a class="nav-link" href="/contact">Contact Us</a>
      @endif
      
    </ul>

    <!-- login/register -->
    <ul class="navbar-nav mr-right">
      @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a>
      @else
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ auth()->user()->first_name }}</a>
          <ul class="dropdown-menu">
            <li><a href="/account">Account</a>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          </ul>
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