@extends('layout.auth')

@section('title', 'Register')

@section('content')



<div class="container">
    <div class="row register-main">
        <div class="register-main-center">
        <h2 class="register-header"><center>Register</center></h2>
            <div class="row">
             <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} register-form-group col-md-5">
                        <label for="first_name" class="control-label">First Name</label>
                            <div class="input-group register-input-group">
                                <input id="first_name" type="text" class="form-control register-form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            </div>
                            @if ($errors->has('first_name'))
                                <div class="alert alert-danger alert-spacing small">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }} register-form-group col-md-2">
                        <label for="middle_initial" class="control-label">M.I.</label>
                        <div class="input-group register-input-group">
                            <input id="middle_initial" type="text" class="form-control register-form-control" name="middle_initial" value="{{ old('middle_initial') }}" required autofocus>
                        </div>
                        @if ($errors->has('middle_initial'))
                            <div class="alert alert-danger alert-spacing small">
                                {{ $errors->first('middle_initial') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} register-form-group col-md-5">
                        <label for="last_name" class="control-label">Last Name</label>
                            <div class="input-group register-input-group">
                                <input id="last_name" type="text" class="form-control register-form-control" name="last_name" value="{{ old('last_name') }}" required autofocus >
                            </div>
                            @if ($errors->has('last_name'))
                                <div class="alert alert-danger alert-spacing small">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} register-form-group col-md-7">
                        <label for="email" class=" control-label">E-Mail Address</label>
                            <div class="input-group register-input-group">
                                <input id="email" type="email" class="form-control register-form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                             @if ($errors->has('email'))
                                <div class="alert alert-danger alert-spacing small">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                    </div>

                    
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} register-form-group col-md-5">
                        <label for="gender" class="control-label register-label">Gender</label>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-5 register-gender">
                                    <input type="radio" name="gender" value="male" checked="checked"> Male
                                </div>
                                <div class="col-md-5 register-gender">
                                    <input class="register-input" type="radio" name="gender" value="female"> Female
                                </div>
                                @if ($errors->has('gender'))
                                    <div class="alert alert-danger alert-spacing small">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>
                    </div>
                </div>

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
                <br>
                <p class="float-left register-gender small">Already have an account? <a class="btn-link" href="{{ route('login') }}"><i class="register-login">Log in</i></a></p>
                <button type="submit" class="btn btn-register float-right">
                    Register
                </button>
                
               
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
