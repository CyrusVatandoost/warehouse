@extends('layout.app')

@section('title','Wrong Username or Password')

<!-- Main Content -->
@section('body')
<div class="container">
    <div class="row main">
        <div class="main-center">
           <h2 class="header text-center">Wrong Username or Password</h2>
            <center>
                <label class="control-label text-center">You entered the wrong username and <br> password combination. </label>
                    <div class="form-group">
                        <a href="{{url('/login')}}" class="btn btn-primary">
                            {!! trans('laravel-user-verification::user-verification.verification_error_back_button') !!}
                        </a>
                    </div>
            </center>
        </div>           
    </div>
</div>
@endsection