@extends('layout.app')

@section('title', 'Not Verified')

<!-- Main Content -->
@section('body')
<style type="text/css">
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

    .main {
        padding : 50px 0;
    }
  
    .main-center {
        margin-top: 30px;
        margin: 0 auto;
        padding: 20px 40px;
        background:#555;
        color: #f5f5f5;
        text-shadow: none;
        border-radius: 10px;
    }

    .confirm-h2 { 
        border-bottom: 1px solid #f5f5f5; 
        padding-bottom: 5px;  
        font-weight:200; 
    }

     .btn-confirm {
        background: #f5f5f5; 
        color: #555; 
        font-weight:600;
        margin-top: 5px;
        border-radius: 5px;
    }

    .verified {
        padding-top: 10px;
        padding-bottom: 10px;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login Error</div>
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
@endsection
