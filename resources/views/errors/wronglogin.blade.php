@extends('layout.app')

<!-- Main Content -->
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Wrong Username or Password</div>
                <div class="panel-body">
                    <span class="help-block">
                        <strong>You entered the wrong username and password combination.</strong>
                    </span>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{url('/login')}}" class="btn btn-primary">
                                {!! trans('laravel-user-verification::user-verification.verification_error_back_button') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection