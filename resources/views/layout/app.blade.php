<!DOCTYPE html>
<html lang="en">
<head>
    <title>T3D WareHouse | @yield('title')</title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="#">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<!-- header -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/warehouse/welcome/">WareHouse</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a>
        <li><a href="#">Projects</a>
        <li><a href="#">Account</a>
        <li><a href="#">Organization</a>
        <li><a href="#">Contact Us</a>
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
        <li>
          <a href="#" data-toggle="dropdown" class="btn">
            <i class="material-icons md-18 md-light">menu</i>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Account</a>
            <li><a href="#">Edit Account</a>
            <li><a href="#">Settings</a>
            <li class="divider">
            <li><a href="/warehouse/login/main_login.php">Logout</a>
          </ul>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      @yield('left-sidebar')
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <h1>@yield('title')</h1>
      @yield('body')
    </div>

    <!-- right sidenav -->
    <div class="col-sm-2 sidenav">
      @yield('right-sidebar')
    </div>

</div>

<footer class="container-fluid text-center">
  <p>ImagineWare Solutions 2017</p>
</footer>

</body>
</html>