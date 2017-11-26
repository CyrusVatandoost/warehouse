<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">WareHouse</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="{{ url('home') }}">Home</a>
        <li><a href="{{ url('projects') }}">Projects</a>
        <li><a href="{{ url('account') }}">Account</a>
        <li><a href="{{ url('organization') }}">Organization</a>
        <li><a href="{{ url('contact') }}">Contact Us</a>
      </ul>
      <!-- navbar-right -->
      <ul class="nav navbar-nav navbar-right">
        <!-- search -->
        <li>
          <form class="navbar-form navbar-left" role="search">
            <input type="text" class="form-control" placeholder="Search WareHouse"/>
            <a class="btn btn-default">
              <i class="material-icons md-18">search</i>
            </a>
          </form>
        @guest
        <li><a href="{{ url('register') }}">Sign Up</a>
        <li><a href="{{ url('login') }}">Login</a>
        @else
        <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
        @endguest
      </ul>
    </div>
  </div>
</nav>