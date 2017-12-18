<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Account History')
<!-- title at body -->
@section('page-title', 'Account History')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
  @include('modals.project-new')
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->  

   @foreach($user->logs as $log) 
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-auto">
            <!-- user profile pic -->
            @if (file_exists(public_path('uploads/avatars/'.auth()->id().'.jpg')))
              <img class="rounded-circle reviewer" src="{{ asset('uploads/avatars/'.auth()->id().'.jpg') }}" height="32" width="32">
            @else
              <img class="rounded-circle reviewer" src="{{ asset('uploads/avatars/default.jpg') }}" height="32" width="32">
            @endif
            &nbsp;
          </div>
          <div class="col">
            <a href="/account/{{$log->user_id}}">You </a>{{ $log->user_action }}: {{ $log->action_details }}
            <br>{{ $log->created_at->diffForHumans() }}
          </div>
        </div>
      </div>
    </div>
  @endforeach

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
@endsection