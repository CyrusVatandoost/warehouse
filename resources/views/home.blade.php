@extends('layout.app')

@section('title', 'Home')

@section('style')
  <style type="text/css">

   .row-striped:nth-of-type(odd) {    
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
@endsection

@section('modals')
  @include('modals.new_project')
@endsection

@section('left-sidenav')
  <p><a href="#" class="btn btn-announcement btn-block">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-project btn-block" data-toggle="modal">New Project</a></p>
@endsection

@section('body')

  <div class="container">

		<div class="row row-striped">
      <!-- date -->
      <div class="col-2 text-right">    
        <h1 class="display-4"><span class="badge badge-secondary">23</span></h1>    
        <h2>OCT</h2>    
      </div>
      <!-- body -->
			<div class="col-10">		
				<a href="/sample"><h3 class="text-uppercase"><strong>Sample WareHouse Page</strong></h3></a>
				<ul class="list-inline">		
				<li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>		
				<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM 2:00 PM</li>		
				<li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Cafe</li>		
				</ul>		
				<p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>		
			</div>		
		</div>

    <div class="row row-striped">
      <!-- date -->
      <div class="col-2 text-right">    
        <h1 class="display-4"><span class="badge badge-secondary">23</span></h1>    
        <h2>OCT</h2>    
      </div>
      <!-- body -->
      <div class="col-10">    
        <a href="/sample"><h3 class="text-uppercase"><strong>Sample WareHouse Page</strong></h3></a>
        <ul class="list-inline">    
        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>    
        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM 2:00 PM</li>   
        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Cafe</li>    
        </ul>   
        <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>   
      </div>    
    </div>

  </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
