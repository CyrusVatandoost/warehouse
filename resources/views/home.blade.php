@extends('layout.app')

@section('title', 'Home')

@section('style')

@endsection

@section('modals')
  @include('modals.new_project')
  @include('modals.new_announcement')
@endsection

@section('left-sidenav')
  <p><a href="#modal-container-new-announcement" class="btn btn-primary btn-block" role="button" data-toggle="modal">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection


@section('body')

  <div class="container">
  @if($announcements->isEmpty())
    <h3 class="display-4 | color">No announcements yet</h3>

  @else
    @foreach($announcements as $announcement)
    <p>
      <div class="row row-striped">
        <div class="col-2 text-center">    
          <h1 class="display-5"><span class="badge badge-info">{{ $announcement->created_at->format('d') }}</span></h1>    
          <h2 class="text-uppercase">{{ $announcement->created_at->format('M') }}</h2>    
        </div>
        <div class="col-10">
          <a href="/announcement/{{ $announcement->announcement_id }}"><h3 class="text-uppercase announcement-title"><strong> {{ $announcement->name }} </strong></h3></a>
          <p>  {{ $announcement->description }} </p>   
        </div>    
      </div>
    @endforeach
  </p>
  @endif
  </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
@endsection
