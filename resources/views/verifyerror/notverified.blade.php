@extends('layout.auth')

@section('title', 'Not Verified')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row verified-main">
        <div class="verified-main-center">
            <div class="panel panel-default">
             <h2 class="verified-confirm-header text-center">Not Verified</h2>
                <div class="panel-heading">
                    Login Error
                </div>
                <div class="panel-body">
                    <span class="help-block">
                        <strong>User is not yet verified or does not exist.</strong>
                    </span>
                    <div class="form-group">
                        <center>
                        <a href="{{url('/')}}" class="btn btn-confirm btn-sm">
                            {!! trans('laravel-user-verification::user-verification.verification_error_back_button') !!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
