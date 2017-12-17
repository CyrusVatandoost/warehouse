@extends('layout.app')

<!-- title at tab -->
@section('title', 'Notifications')
<!-- title at body -->
@section('page-title', 'Notifications')

<!-- css styles -->
@section('style')

@endsection

<!-- modals -->
@section('modals')

@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')

   @foreach($logs as $log) 
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-auto">
            <!-- user profile pic -->
            @if (file_exists(public_path('uploads/avatars/'.$log->user_id.'.jpg')))
              <img class="rounded-circle reviewer" src="{{ asset('uploads/avatars/'.$log->user_id.'.jpg') }}" height="32" width="32">
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