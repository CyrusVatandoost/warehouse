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
  @if (file_exists(public_path('storage/avatars/'.auth()->user()->user_id.'.jpg')))
    <img class="rounded-circle" src="{{ asset('storage/avatars/'.auth()->user()->user_id.'.jpg') }}" height="256" width="256">
  @else
    <img class="rounded-circle" src="{{ asset('storage/avatars/default.jpg') }}" height="256" width="256">
  @endif
  <form method="POST" action="/account/{{ auth()->user()->user_id }}/upload-avatar" enctype="multipart/form-data">
  	{{ csrf_field() }}
    <label for="profile_pic">Upload Profile Pic</label>
    <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
		<button type="submit" class="btn btn-primary">Upload</button>
	</form>
  <br>
  <div class="form-group">
     <label for="profile_bio">Edit your biography</label>
      <textarea class="form-control" rows="3" name="profile_bio"></textarea>
  </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection
