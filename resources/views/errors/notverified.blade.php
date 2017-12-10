@extends('layout.auth')

@section('title','Not verified')

<!-- Main Content -->
@section('content')
<div class="container">
     <div class="row main">
        <div class="main-center">
           <h2 class="header text-center">Not Verified</h2>
              <label class="control-label text-center">Your email is not yet verified <br> Please check your email.</label>
                    <center>
                    <div class="form-group">
                        <a href="{{url('/login')}}" class="btn btn-primary">
                            {!! trans('laravel-user-verification::user-verification.verification_error_back_button') !!}
                        </a>
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
