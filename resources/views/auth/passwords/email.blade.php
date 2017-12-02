@extends('layout.auth')

@section('title','Forgot Password')

@section('content')
<style type="text/css">
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

    body, html{
        height: 100%;
    }

    .main{
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

    .email-h2 { 
        border-bottom: 1px solid #f5f5f5; 
        padding-bottom: 5px;  
        font-weight:200; 
    }

     .btn-email {
        background: #f5f5f5; 
        color: #555; 
        font-weight:600;
        margin-top: 5px;
        border-radius: 5px;
    }

</style>

<div class="container">
    <div class="row main">
        <div class="main-center">
        <h2 class="email-h2 text-center">Forgot Password</h2>
          
<!--
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
-->
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label text-center">Please enter your email address and we'll send you <br> instruction on how to reset your password</label>

                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                      
                        <center>
                            <button type="submit" class="btn btn-email">
                                Submit
                            </button>
                        </center>
                          
                    </form>
        </div>
    </div>
</div>
@endsection
