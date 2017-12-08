@extends('layout.app')

@section('title', 'Home')

@section('style')

@endsection

@section('modals')
  @include('modals.new_project')
  @include('modals.announcement-new')
@endsection

@section('left-sidenav')
  <p><a href="#modal-container-new-announcement" class="btn btn-primary btn-block" role="button" data-toggle="modal">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection


@section('body')

  <div class="container">

  @if($announcements->isEmpty())
    <h3 class="display-4 | color">No announcements yet</h3>

  @foreach($announcements as $a)
    @if($a->visibility == 0)

    @endif
  @endforeach

  @else
    @foreach($announcements as $announcement)
    <p>
      @if($announcement->visibility == 1)
      <div class="row row-striped">
        <div class="col-2 text-center">    
          <h1 class="display-5"><span class="badge badge-info">{{ $announcement->created_at->format('d') }}</span></h1>    
          <h2 class="text-uppercase">{{ $announcement->created_at->format('M') }}</h2>    
        </div>
        <div class="col-10 limit">
          <a href="/announcement/{{ $announcement->announcement_id }}">
            <h3 class="text-uppercase announcement-title">
            <strong> {{ $announcement->name }} </strong>
            </h3>
          </a>
          <p>  {{ $announcement->description }} </p>   
        </div>    
      </div>
      @endif
    @endforeach
  </p>
  @endif
  </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
@endsection

@section('customscripts')
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include date range picker -->
<script type-"text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
@endsection
