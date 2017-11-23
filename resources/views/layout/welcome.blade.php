<!DOCTYPE html>
<html lang="en">
<head>
  <title>T3D WareHouse | @yield('title')</title>
  @include('layout.style')
</head>
<body>

<!-- header -->
@include('layout.header')

<div class="container-fluid text-center">

  <div class="row content">
    <div class="col text-left">
      @yield('carousel')
    </div>
  </div>

  <div class="row content">
    <div class="col-sm-10 text-left"> 
	      @yield('body')
    </div>
  </div>

</div>

<!-- footer -->
@include('layout.footer')

</body>
</html>