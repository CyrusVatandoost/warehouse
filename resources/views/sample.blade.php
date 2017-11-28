@extends('layout.app')

@if(Auth::check())
  @section('title', 'Home')
@endif

@if(!Auth::check())
  @section('title', 'Home')
@endif

@section('left-sidenav')
  <button type="button" class="btn btn-primary btn-block">Primary</button>
  <button type="button" class="btn btn-primary btn-block">Primary</button>
@endsection

<style type="text/css">
  .row-striped:nth-of-type(odd){
  background-color: #efefef;
  border-left: 4px #000000 solid;
}

.row-striped:nth-of-type(even){
  background-color: #ffffff;
  border-left: 4px #efefef solid;
}

.row-striped {
    padding: 15px 0;
}
</style>

@section('body')
  <div class="container">
    <div class="row row-striped">
      <div class="col-2 text-right">
        <h1 class="display-4"><span class="badge badge-secondary">23</span></h1>
        <h2>OCT</h2>
      </div>
      <div class="col-10">
        <h3 class="text-uppercase"><strong>Ice Cream Social</strong></h3>
        <ul class="list-inline">
            <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
          <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
          <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Cafe</li>
        </ul>
        <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
    <div class="row row-striped">
      <div class="col-2 text-right">
        <h1 class="display-4"><span class="badge badge-secondary">27</span></h1>
        <h2>OCT</h2>
      </div>
      <div class="col-10">
        <h3 class="text-uppercase"><strong>Operations Meeting</strong></h3>
        <ul class="list-inline">
            <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Friday</li>
          <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 2:30 PM - 4:00 PM</li>
          <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Room 4019</li>
        </ul>
        <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
  </div>
  
@endsection


@section('right-sidenav')
  <div class="card">
    <div class="card-body">
      Project Title
    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-body">
      Project Title
    </div>
  </div>
@endsection

