@extends('layout.app')

@section('title', 'Account')

@section('left-sidenav')
  <p><a href="/account/edit" class="btn btn-primary btn-block">Edit Profile</a></p>
@endsection

@section('body')

  @if(!empty(auth()->user()->admin))
    <span class="badge badge-dark">Admin</span>
  @endif

  <div class="banner">
    <div class="container">
      <div class="profile-pic"> 
        <div class="avatar">
          @if (file_exists(public_path('avatars/'.auth()->user()->user_id.'.jpg')))
            <img class="rounded-circle" src="{{ asset('avatars/'.auth()->user()->user_id.'.jpg') }}" height="256" width="256">
          @else
            <img class="rounded-circle" src="{{ asset('avatars/default.jpg') }}" height="256" width="256">
          @endif
        </div>
      </div>
      <div class="bio">
        <h2 class="heading-medium">{{ auth()->user()->first_name }} {{ auth()->user()->middle_initial }} {{ auth()->user()->last_name }}</h2>
        <h5 class="heading-small">TE<sup>3</sup>D Member</h5>
        <h6 class="heading-small">{{ auth()->user()->email }}</h6>
        <p class="body-small">Hi I'm {{ auth()->user()->first_name }} and I am a third year college student taking up bachelor of science computer science in De La Salle University</p>
    </div>
  </div>
</div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
@endsection
