@extends('layout.auth')

@section('title', 'Register')

@section('content')
<style type="text/css">
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

    body, html{
        height: 100%;
    }

    .main{
        padding : 50px 0;
    }

    h2 { 
        border-bottom: 1px solid #f5f5f5; 
        padding-bottom: 5px;  
        font-weight:200; 
    }

     .alert-spacing{
        padding: 5px;
    }

    .form-group{
        margin-bottom: 10px;
    }

    label{
        margin-bottom: 4px;
    }

    .form-control {
        height: auto !important;
        padding: 8px 12px !important;
    }

    .input-group{
        background: #f5f5f5;
        border-radius: 5px;
    }
   
    .main-center{
        margin-top: 30px;
        margin: 0 auto;
        padding: 20px 40px;
        background:#555;
        color: #f5f5f5;
        text-shadow: none;
        border-radius: 10px;
    }

    .btn-register{
        background: #f5f5f5; 
        color:#555;
        font-weight:600;
    }

    .btn-link{
        color:#f5f5f5 !important;
    }

</style>



<div class="container">
    <div class="row main">
        <div class="main-center">
        <h2><center>Register</center></h2>
            <div class="row">
             <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-5">
                        <label for="first_name" class="control-label">First Name</label>
                            <div class="input-group">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            </div>
                            @if ($errors->has('first_name'))
                                <div class="alert alert-danger alert-spacing small">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                    </div>

                    <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }} col-md-2">
                        <label for="middle_initial" class="control-label">M.I.</label>
                        <div class="input-group">
                            <input id="middle_initial" type="text" class="form-control" name="middle_initial" value="{{ old('middle_initial') }}" required autofocus>
                        </div>
                        @if ($errors->has('middle_initial'))
                            <div class="alert alert-danger alert-spacing small">
                                {{ $errors->first('middle_initial') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-5">
                        <label for="last_name" class="control-label">Last Name</label>
                            <div class="input-group">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus >
                            </div>
                            @if ($errors->has('last_name'))
                                <div class="alert alert-danger alert-spacing small">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-7">
                        <label for="email" class=" control-label">E-Mail Address</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                             @if ($errors->has('email'))
                                <div class="alert alert-danger alert-spacing small">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                    </div>

                    
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} col-md-5">
                        <label for="gender" class="control-label">Gender</label>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <input type="radio" name="gender" value="male" checked="checked"><small> Male</small>
                                </div>
                                <div class="col-md-5">
                                    <input type="radio" name="gender" value="female"><small> Female</small>
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
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
                        <label for="password" class="control-label">Password</label>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                         @if ($errors->has('password'))
                            <div class="alert alert-danger alert-spacing small">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password-confirm" class="control-label">Confirm Password</label>
                        <div class="input-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <br>
                <p class="float-left"><small>Already have an account? <a class="btn-link" href="{{ route('login') }}"><i>Log in</i></a></small></p>
                <button type="submit" class="btn btn-register float-right">
                    Register
                </button>
                
               
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
