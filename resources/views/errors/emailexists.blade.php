@extends('layout.app')

<!-- Main Content -->
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Email Exists!</div>
                <div class="panel-body">
                    <span class="help-block">
                        <strong>The email you entered already exists!</strong>
                    </span>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{url('/')}}" class="btn btn-primary">
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