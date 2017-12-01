
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- Google's Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/map.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/material-icons.css') }}" media="all" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
      $(document).ready(function() {
      $(".expandable").on("click", ".add-more", function(e) {
        e.preventDefault();
        var rmButton = '<button class="btn btn-danger remove-me" type="button">-</button>';
        var grandParent = $(this).parent().parent();
        var countVal = grandParent.data("count");
        var count = parseInt(countVal);
        if (count == 1) {
          $(this).before(rmButton);
        }
        var toBeCopied = $(this).parent().clone();
        if (count == 1) { 
            var curClass = toBeCopied.find("input").attr('class');
            toBeCopied.find("input:first").attr('class', curClass + " offset-md-3");
            toBeCopied.find("label").remove();

        }
        var add_button = $(this).detach();
        grandParent.append(toBeCopied);
        count++;
        grandParent.data("count", count);
      });

      $(".expandable").on("click", ".remove-me", function(e) {
        e.preventDefault();
        var grandParent = $(this).parent().parent();
        var countVal = grandParent.data("count");
        count = parseInt(countVal);
        count--;
        grandParent.data("count", count);

        var nextButton = $(this).next("button");
        var prevButton = $(this).parent().prev().find("button");

        //When we click remove on the last entry:
        if (/add-more/.test(nextButton.attr("class")) && /remove-me/.test(prevButton.attr("class"))) {
          var add_button = nextButton.detach();
          $(this).parent().prev().find(".remove-me").after(add_button);
        }
        //When we click on the first entry:
        if ($(this).parent().children().is("label")) {
            secondEntry=$(this).parent().next().find("input");
            secondEntry.removeClass("offset-md-3");
            secondEntry.before($(this).parent().find("label"));
        }
        if (count == 1) {
          $(this).parent().prev().find(".remove-me").remove();
          $(this).parent().next().find(".remove-me").remove();
        }
        $(this).parent().remove();
        });

      });
    </script>

  </head>

  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="/welcome">WareHouse</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/sample">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/organization">Organization</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact Us</a>
          </li>

          @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="/account">{{ auth()->user()->first_name }}</a>
            </li>
          @endif
          
        </ul>

        <!-- search -->
        <form class="form-inline mt-2 mt-md-0" action="/search">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            <i class="material-icons md-18 material-icons-mid">search</i>
          </button>
        </form>

        <!-- login/register -->
        <ul class="navbar-nav mr-right">
          @guest
              <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
          @else
              <li class="dropdown">
                  <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ auth()->user()->first_name }}</a>

                  <ul class="dropdown-menu">
                      <li>
                          <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest
        </ul>

      </div>
    </nav>

    <div class="container-fluid text-center">
      <div class="row content">

        <!-- left sidenav -->
        <div class="col-sm-2 sidenav">
          @yield('left-sidenav')
        </div>

        <!-- body -->
        <div class="col-sm-8 text-left"> 
          <h1>@yield('page-title')</h1>
          @yield('body')
        </div>

        <!-- right sidenav -->
        <div class="col-sm-2 sidenav">
          @yield('right-sidenav')
        </div>

      </div>
    </div>

    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <center>
          <table class="foot small">
            <tr>
              <td><br><h5>TE<sup>3</sup>D HOUSE</h5>
              <td><br><h5>WAREHOUSE</h5>
            <tr>
              <td><a href="/welcome">About TED House</a>
              <td><a href="/home">Home</a>
            <tr>
              <td>inquire@te3dhouse.edu.ph
              <td><a href="/projects">Projects</a>
            <tr>
              <td>(02) 809 7392
              <td><a href="/contact">Contact Us</a>
            <tr>
              <td>LTI Spine Road, Laguna Blvd. Binan
              <td><a href="/login">Members Sign In</a>
              <td>ImagineWare Solutions, Inc. 2017
          </table>
      </div>
    </footer>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  </body>
</html>
