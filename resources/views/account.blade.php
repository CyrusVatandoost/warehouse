@extends('layout.app')

@section('title', 'Account')

@section('left-sidenav')
  @if($user->user_id == auth()->id())
    <p><a href="/account/edit" class="btn btn-primary btn-block">Edit Profile</a></p>
    <p><a href="/account/settings" class="btn btn-primary btn-block">Account Settings</a></p>
    <p><a href="/account/history" class="btn btn-primary btn-block">Account History</a></p>
  @endif
@endsection

@section('body')
  <div class="banner">
    <div class="container">
      <div class="profile-pic"> 
        <div class="avatar">
          @if (file_exists(public_path('uploads/avatars/'.$user->user_id.'.jpg')))
            <img class="rounded-circle" src="{{ asset('uploads/avatars/'.$user->user_id.'.jpg') }}" height="256" width="256">
          @else
            <img class="rounded-circle" src="{{ asset('uploads/avatars/default.jpg') }}" height="256" width="256">
          @endif
        </div>
      </div>
      <div class="accountbio">
        <h2 class="heading-medium">{{ $user->first_name }} {{ $user->middle_initial }} {{ $user->last_name }}</h2> 
        @if(App\Admin::get()->contains('user_id', Auth::id()))
          <span class="badge badge-dark">Admin</span>
        @endif
        @if(!empty($user->organizationPosition))
          <span class="badge badge-info">{{ $user->organizationPosition->position->name }}</span>
        @endif
        <h6 class="heading-small">{{ $user->email }}</h6>
        <p class="body-small">{{ $user->bio }}</p>
    </div>
  </div>
</div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')

@endsection

