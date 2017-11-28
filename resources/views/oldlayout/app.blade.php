<!DOCTYPE html>
<html lang="en">
<head>
  <title>T3D WareHouse | @yield('title')</title>
  @include('oldlayout.style')
</head>
<body>

<!-- header -->
@include('oldlayout.header')

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

<!-- footer -->
@include('oldlayout.footer')

</body>
</html>