@extends('layout.app')

@section('title', 'Account')

@section('left-sidenav')

@endsection

@section('body')

  @if(!empty(auth()->user()->admin))
    <span class="badge badge-dark">Admin</span>
  @endif

  <div class="banner">
    <div class="container">
      <div class="profile-pic"> 
        <div class="avatar">
          @if (file_exists(public_path('storage/avatars/'.auth()->user()->user_id.'.jpg')))
            <img class="rounded-circle" src="{{ asset('storage/avatars/'.auth()->user()->user_id.'.jpg') }}" height="256" width="256">
          @else
            <img class="rounded-circle" src="{{ asset('storage/avatars/default.jpg') }}" height="256" width="256">
          @endif
        </div>
      </div>
      <div class="accountbio">
        <h2 class="heading-medium">{{ auth()->user()->first_name }} {{ auth()->user()->middle_initial }} {{ auth()->user()->last_name }}</h2>
        <h5 class="heading-small">TE<sup>3</sup>D Member</h5>
        <h6 class="heading-small">{{ auth()->user()->email }}</h6>
        <p class="body-small">{{ auth()->user()->bio }}</p>
    </div>
  </div>
</div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
@endsection
