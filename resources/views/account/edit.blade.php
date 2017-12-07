<!-- this page follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Edit Profile')
<!-- title at body -->
@section('page-title', 'Edit Profile')

<!-- css styles -->
@section('style')
	<!-- insert css styles here -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
@endsection

<!-- left-sidenav -->
@section('left-sidenav')

@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->
  <img src="{{ asset('avatars/'.auth()->user()->user_id.'.jpg') }}" height="300" width="300">
  <form method="POST" action="/account/{{ auth()->user()->user_id }}/upload-avatar" enctype="multipart/form-data">
  	{{ csrf_field() }}
    <label for="profile_pic">Upload Profile Pic</label>
    <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
		<button type="submit" class="btn btn-primary">Upload</button>
	</form>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection