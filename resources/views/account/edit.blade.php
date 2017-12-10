<!-- this page follows this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Edit Profile')
<!-- title at body -->
@section('page-title', 'Edit Profile')

<!-- css styles -->
@section('style')
  <!-- insert css styles here -->
  <style type="text/css">
    .btn-browse{
      margin-bottom: 10px;
    }
    .uploadimage{
      margin-top: 30px;
    }
  </style>
@endsection

<!-- modals -->
@section('modals')
  <!-- insert css styles here -->
@endsection


<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="/account/" class="btn btn-primary btn-block">My Account</a></p>
  <p><a href="/account/settings" class="btn btn-primary btn-block">Account Settings</a></p>
@endsection

<!-- body -->
@section('body')
  <!-- insert body here -->
<div class="row">
  <div class="col-md-6">
    <label for="profile_pic">Upload Profile Pic</label><br>
    <center>
    @if (file_exists(public_path('uploads/avatars/'.auth()->user()->user_id.'.jpg')))
      <img id="dp" class="rounded-circle" src="{{ asset('uploads/avatars/'.auth()->user()->user_id.'.jpg') }}" height="256" width="256">
    @else
      <img id="dp" class="rounded-circle" src="{{ asset('/uploads/avatars/default.jpg') }}" height="256" width="256">
    @endif
    </center>
    <form method="POST" action="/account/{{ auth()->user()->user_id }}/upload-avatar" enctype="multipart/form-data">
      {{ csrf_field() }}
        <input type="file" class="form-control-file uploadimage" id="profile_pic" name="profile_pic" onchange="document.getElementById('dp').src = window.URL.createObjectURL(this.files[0])"><br>
        <button type="submit" class="btn btn-browse float-right">Upload</button><br>
    </form>
  </div>
  <div class="col-md-6">
  <!-- save changes button -->
    <form method="POST" action="/account/{{ auth()->user()->user_id }}/edit-bio">
      {{ csrf_field() }}

      <div class="editbio">
        <div class="form-group">
          <label for="profile_bio">Edit your biography</label>
          <textarea class="form-control" rows="4" name="profile_bio" maxlength="500"> {{ auth()->user()->bio }} </textarea>
        </div>

        <button type="submit" class="btn btn-browse float-right">Save Changes</button>
      </div>
    </form>
  </div>
</div>
@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav')
@endsection



@section('customscripts')