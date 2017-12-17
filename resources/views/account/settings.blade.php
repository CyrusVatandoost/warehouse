<!-- DO NOT DELETE THIS FILE -->

<!-- this page follows this layout -->
<!-- i suggest make all new pages follow this layout -->
@extends('layout.app')

<!-- title at tab -->
@section('title', 'Account Settings')
<!-- title at body -->
@section('page-title', 'Account Settings')

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
  <p><a href="/account/" class="btn btn-primary btn-block">My Account</a></p>
  <p><a href="/account/edit" class="btn btn-primary btn-block">Edit Profile</a></p>
@endsection

<!-- body -->
@section('body')
  
  <form method="POST" action="/account/details-update">
    {{ csrf_field() }}
    <div class="card w-100">
      <div class="card-header">
        Account Settings
      </div>
      <div class="card-body">

        <div class="form-row">

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} register-form-group col-md-5">
            <label for="first_name" class="control-label">First Name</label>
              <div class="input-group register-input-group">
                <input id="first_name" type="text" class="form-control register-form-control" name="first_name" value="{{ auth()->user()->first_name }}" required autofocus>
              </div>
          </div>

          <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }} register-form-group col-md-2">
            <label for="middle_initial" class="control-label">M.I.</label>
            <div class="input-group register-input-group">
              <input id="middle_initial" type="text" class="form-control register-form-control" name="middle_initial" value="{{ auth()->user()->middle_initial }}" required autofocus>
            </div>
          </div>

          <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} register-form-group col-md-5">
            <label for="last_name" class="control-label">Last Name</label>
              <div class="input-group register-input-group">
                <input id="last_name" type="text" class="form-control register-form-control" name="last_name" value="{{ auth()->user()->last_name }}" required autofocus >
              </div>
          </div>

        </div>

        <div class="form-row">

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} register-form-group col-md-7">
            <label for="email" class=" control-label">E-Mail Address</label>
            <div class="input-group register-input-group">
              <input id="email" type="email" class="form-control register-form-control" name="email" value="{{ auth()->user()->email }}" required>
            </div>
          </div>

          <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} register-form-group col-md-5">
            <label for="gender" class="control-label register-label">Gender</label>
              <div class="row">
                <div class="col-md-2"></div>

                  @if( auth()->user()->gender == 'Male' )
                    <div class="col-md-5 register-gender">
                      <input type="radio" name="gender" value="male" checked="checked"> Male
                    </div>

                    <div class="col-md-5 register-gender">
                      <input type="radio" name="gender" value="female"> Female
                    </div>

                  @else
                    <div class="col-md-5 register-gender">
                      <input class="register-input" type="radio" name="gender" value="male"> Male
                    </div>

                    <div class="col-md-5 register-gender">
                      <input type="radio" name="gender" value="female" checked="checked"> Female
                    </div>
                  @endif

              </div>
          </div>
        
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Update Account
        </button>
      </div> 
    </div>
  </form>

  <br>

  <form method="POST" action="/account/password-update">
    {{ csrf_field() }}
    <div class="card w-100">
      <div class="card-header">
        Change Password
      </div>
      <div class="card-body">
        <div class="form-row">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} register-form-group col-md-6">
                <label for="password" class="control-label">Password</label>
                <div class="input-group register-input-group">
                    <input id="password" type="password" class="form-control register-form-control" name="password" required>
                </div>
                 @if ($errors->has('password'))
                    <div class="alert alert-danger alert-spacing small">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group register-form-group col-md-6">
                <label for="password-confirm" class="control-label">Confirm Password</label>
                <div class="input-group register-input-group">
                    <input id="password-confirm" type="password" class="form-control register-form-control" name="password_confirmation" required>
                </div>
            </div>
        </div>
      </div>
      <div class="card-footer">
          <button type="submit" class="btn btn-primary">
            Change Password
          </button>
      </div>
    </div>
  </form>

  <div class="container">
  <div class="row register-main">
      <div class="register-main-center">
          
                        @if (session('alert'))
                 <div class="alert alert-success">
                     {{ session('alert') }}
                 </div>
              @endif   
          
          <div class="row">
           <form class="form-horizontal" method="POST" action="/account/{{ auth()->user()->user_id }}/settings">
              {{ csrf_field() }}          

              <div class="form-row">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} register-form-group col-md-5">
                      <label for="first_name" class="control-label">First Name</label>
                          <div class="input-group register-input-group">
                              <input id="first_name" type="text" class="form-control register-form-control" name="first_name" value="{{ auth()->user()->first_name }}" required autofocus>
                          </div>
                  </div>

                  <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }} register-form-group col-md-2">
                      <label for="middle_initial" class="control-label">M.I.</label>
                      <div class="input-group register-input-group">
                          <input id="middle_initial" type="text" class="form-control register-form-control" name="middle_initial" value="{{ auth()->user()->middle_initial }}" required autofocus>
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} register-form-group col-md-5">
                      <label for="last_name" class="control-label">Last Name</label>
                          <div class="input-group register-input-group">
                              <input id="last_name" type="text" class="form-control register-form-control" name="last_name" value="{{ auth()->user()->last_name }}" required autofocus >
                          </div>
                  </div>
              </div>

              <div class="form-row">
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} register-form-group col-md-7">
                      <label for="email" class=" control-label">E-Mail Address</label>
                          <div class="input-group register-input-group">
                              <input id="email" type="email" class="form-control register-form-control" name="email" value="{{ auth()->user()->email }}" required>
                          </div>
                  </div>

                  
                  <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} register-form-group col-md-5">
                      <label for="gender" class="control-label register-label">Gender</label>
                          <div class="row">
                              <div class="col-md-2"></div>

                              @if( auth()->user()->gender == 'Male' )
                                  <div class="col-md-5 register-gender">
                                      <input type="radio" name="gender" value="male" checked="checked"> Male
                                  </div>

                                  <div class="col-md-5 register-gender">
                                      <input class="register-input" type="radio" name="gender" value="female"> Female
                                  </div>

                              @else
                                  <div class="col-md-5 register-gender">
                                      <input class="register-input" type="radio" name="gender" value="male"> Male
                                  </div>

                                  <div class="col-md-5 register-gender">
                                      <input type="radio" name="gender" value="female" checked="checked"> Female
                                  </div>
                              @endif

                          </div>
                  </div>
              </div>


              <!-- requires verification -->

              <div class="form-row">
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} register-form-group col-md-6">
                      <label for="password" class="control-label">Password</label>
                      <div class="input-group register-input-group">
                          <input id="password" type="password" class="form-control register-form-control" name="password" required>
                      </div>
                       @if ($errors->has('password'))
                          <div class="alert alert-danger alert-spacing small">
                              {{ $errors->first('password') }}
                          </div>
                      @endif
                  </div>

                  <div class="form-group register-form-group col-md-6">
                      <label for="password-confirm" class="control-label">Confirm Password</label>
                      <div class="input-group register-input-group">
                          <input id="password-confirm" type="password" class="form-control register-form-control" name="password_confirmation" required>
                      </div>
                  </div>
              </div>

              <div class="alert alert-warning" role="alert">
                Changing email and password is not supported yet.
              </div>

              <button type="submit" class="btn btn-register btn-browse float-right">
                  Update Account
              </button>
              
             
          </form>
          </div>
      </div>
  </div>
</div>

@endsection

<!-- right-sidenav -->
@section('right-sidenav')
  <!-- insert featured projects here -->
  @include('layout.right-sidenav') <!-- you can remove this if you do not want the featured projects to be shown -->
@endsection