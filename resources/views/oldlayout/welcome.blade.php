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
    <div class="col text-left">
      @yield('carousel')
    </div>
  </div>

  <div class="row content">
    <div class="col-sm-12 text-left"> 
      <p>
	      @yield('body')
      </p>
    </div>
  </div>

</div>

<!-- footer -->
@include('oldlayout.footer')

</body>
</html>