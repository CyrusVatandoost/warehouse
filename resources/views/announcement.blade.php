<!-- this page follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Announcement')
<!-- title at body -->
@section('page-title', 'Announcement')

<!-- css styles -->
@section('style')
	<!-- insert css styles here -->
  <style type="text/css">
    .reviews{
      padding: 0;
      margin: 0;
    }

    .review-item{
      background-color: white;
      padding: 15px; 
      margin-bottom: 5px;
      border: 1px solid #cecece;
    }

    .review-item .review-date{
      color: #cecece;
    }
    .review-item .review-text{
      font-size: 16px;
      font-weight: normal;
      margin-top: 5px;
      color: #343a40;
    }

    .review-item .reviewer{
      width: 64px;
      height: 64px;
      border: 1px solid #cecece;
    }

  </style>
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.new_project')  
  @include('modals.announcement-new')
  @include('modals.announcement-delete')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="#modal-container-delete-announcement" role="button" class="btn btn-danger btn-block" data-toggle="modal">Delete Announcement</a></p>
  <p><a href="#modal-container-new-announcement" class="btn btn-primary btn-block" role="button" data-toggle="modal">New Announcement</a></p>
  <p><a href="#modal-container-new-project" role="button" class="btn btn-primary btn-block" data-toggle="modal">New Project</a></p>
@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->  
  <br>
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="reviews">
            <div class="row blockquote review-item">
              <div class="col-md-3 text-center">

                <!-- user profile pic -->
                @if (file_exists(public_path('storage/avatars/'.auth()->user()->user_id.'.jpg')))
                  <img class="rounded-circle reviewer" src="{{ asset('uploads/avatars/'.auth()->user()->user_id.'.jpg') }}" height="256" width="256">
                @else
                  <img class="rounded-circle reviewer" src="{{ asset('uploads/avatars/default.jpg') }}" height="256" width="256">
                @endif

                <div class="caption small">

                  <small><a href="/account/{{$announcement->user->user_id}}"> {{ $announcement->user->first_name}} {{ $announcement->user->last_name }} </a></small>
                  <br>
                  @if(!empty($announcement->user->admin))
                    <span class="badge badge-dark">Admin</span>
                  @endif
                  @if(!empty($announcement->user->organizationPosition->position->name))
                    <span class="badge badge-info">{{ $announcement->user->organizationPosition->position->name }}</span>
                  @endif

                </div>
              </div>
              <div class="col-md-9">
                <h3 class="display-4 limit"><strong>{{ $announcement->name }}</strong></h3>
                <p class="display-12 review-date small">Posted {{ $announcement->created_at->diffForHumans() }} (Expires on {{ $announcement->expires_on }})</p>
                <div class="ratebox text-center" data-id="0" data-rating="5"></div>
                <p class="review-text text-justify"> {{ $announcement->description }} </p>
              </div>                          
            </div>  
          </div>
        </div>
      </div>
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
