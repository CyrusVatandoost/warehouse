@extends('layout.auth')

@section('title', 'Login')

@section('content')
<style type="text/css">
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
    .login-block {
        float:left;
        width:100%;
        padding : 50px 0;
    }

    .alert-spacing {
        margin-top: 5px;
    }

    .banner-sec {
        background-size:cover;    
        min-height:500px; 
        border-radius: 0 10px 10px 0; 
        padding:0;
    }

    .container {
        background: #555; 
        border-radius: 10px; 
    }

    .carousel-inner {
        border-radius:0 10px 10px 0;
    }

    .carousel-caption {
        text-align:left; left:5%;
    }

    .login-sec {
        padding: 50px 30px; position:relative;
    }

    .login-sec .copy-text {
        position:absolute; 
        width:80%; 
        bottom:20px; 
        font-size:13px; 
        text-align:center;
    }

    .login-sec .copy-text i {
        color:#f5f5f5;
    }

    .login-sec .copy-text a {
        color:#f5f5f5;
    }

    .login-sec h2 {
        margin-bottom:30px;
        font-weight:200; 
        font-size:30px; 
        color:#f5f5f5;
    }

    .login-sec h2:after {
        content:" "; 
        width:100px; 
        height:1px; 
        background:#f5f5f5; 
        display:block; 
        margin-top:20px; 
        border-radius:3px; 
        margin-left:auto;
        margin-right:auto
    }

    .btn-login {
        background: #f5f5f5; 
        color:#555;
        font-weight:600;
    }

    .btn-link, label {
         color:#f5f5f5 !important;
    }

    .banner-text {
        width:70%; 
        position:absolute; 
        bottom:40px; 
        padding-left:20px;
        border-radius: 5px;
        background: rgba(1,1,1,0.5);
    }

    .banner-text h2 {
        color: white; 
        font-weight:500;
    }

    .banner-text h2:after {
        content:" "; 
        width:100px; 
        height:2px; 
        background: white; 
        display:block; 
        margin-top:10px; 
        border-radius:3px;
    }

    .banner-text p {
        color: white;
    }

    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

</style>
<section class="login-block">
<div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Login Now</h2>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger alert-spacing small">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <div class="alert alert-danger alert-spacing small">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        <i> Forgot Your Password? </i>
                    </a>
                    <button type="submit" class="btn btn-login float-right">
                        Login
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="storage/people-coffee-tea-meeting.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                        <div class="banner-text">
                            <h2>This is Heaven</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                        </div>  
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="storage/people-woman-coffee-meeting.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                        <div class="banner-text">
                            <h2>This is Heaven</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                        </div>  
                        </div>
                    </div>
                     <div class="carousel-item">
                        <img class="d-block img-fluid" src="storage/pexels-photo.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                        <div class="banner-text">
                            <h2>This is Heaven</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                        </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
