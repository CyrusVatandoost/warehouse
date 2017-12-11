<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'User Dashboard')
<!-- title at body -->
@section('page-title', 'User Dashboard')

<!-- css styles -->
@section('style')
	<!-- insert custom css styles here -->
	<!-- i suggest to avoid custom css styles and have it in the .css file in `public/css` -->
@endsection

<!-- modals -->
@section('modals')
	<!-- insert css styles here -->
@endsection

<!-- left-sidenav -->
@section('left-sidenav')
  <p><a href="/admin" class="btn btn-primary btn-block">Back to Dashboard</a></p>
@endsection

<!-- body -->
@section('body')

  <h4>Users</h4>
  <div class="table-responsive">   
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th>First name
          <th>Middle Initial
          <th>Last Name
          <th>Email Address
          <th>Created On
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->first_name }}
            <td>{{ $user->middle_initial }}
            <td>{{ $user->last_name }}
            <td>{{ $user->email }}
            <td>{{ $user->created_at }}
        @endforeach
      </tbody>
    </table>
  </div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection

@section('scripts')
	<!-- insert scripts here -->
@endsection