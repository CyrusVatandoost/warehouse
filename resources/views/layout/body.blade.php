<div class="container-fluid text-center">
  <div class="row content">

    <!-- left sidenav -->
    <div class="col-sm-2 sidenav">
      @yield('left-sidenav')
    </div>

    <!-- body -->
    <div class="col-sm-8 text-left"> 
      <h1 class="page-title">@yield('page-title')</h1>
      @yield('body')
    </div>

    <!-- right sidenav -->
    <div class="col-sm-2 sidenav">
      @yield('right-sidenav')
    </div>

  </div>
</div>