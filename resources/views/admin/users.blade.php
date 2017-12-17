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

  <div class="card">
    <div class="card-header">
      Create New User
    </div>
    <div class="card-body">
      <form method="POST" action="/user/new">
        {{ csrf_field() }}

        <!-- name -->
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label>First Name</label>
              <input type="text" class="form-control" placeholder="First name" name="first_name" required>
            </div>
            <div class="col">
              <label>Middle Initial</label>
              <input type="text" class="form-control" placeholder="Middle initial" name="middle_initial" required>
            </div>
            <div class="col">
              <label>Last Name</label>
              <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
            </div>
          </div>
        </div>

        <!-- gender -->
        <div class="form-group">
          <label>Gender</label>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>Male
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="false">Female
            </label>
          </div>
        </div>

        <!-- email -->
        <div class="form-group">
          <label>Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
        </div>

        <!-- password -->
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>

  <br>
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

  <h4>Waitlist:</h4>
  <div class="table-responsive">   
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th>First name
          <th>Middle Initial
          <th>Last Name
          <th>Email Address
          <th>Action
      </thead>
      <tbody>
        @foreach($waitlists as $waitlist)
          <tr>
            <td>{{ $waitlist->first_name }}
            <td>{{ $waitlist->middle_initial }}
            <td>{{ $waitlist->last_name }}
            <td>{{ $waitlist->email }}
            <td><a style="margin-right: 7px;" href="admin/approve/{{ $waitlist->user_id }}/mail/{{ $waitlist->email }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok"></span> Approve</a><a href="admin/disapprove/{{ $waitlist->user_id }}/mail/{{ $waitlist->email }}" class="btn btn-sm btn-danger">Disapprove</a>
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