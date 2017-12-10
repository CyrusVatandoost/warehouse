@extends('layout.auth')

@section('title','Forgot Password')

@section('content')
<div class="container">
    <div class="row main">
        <div class="main-center">
            <h2 class="header text-center">Forgot Password</h2>
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
                            <a href="{{url('/login')}}" class="btn btn-info">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            
                        </center>
                          
                    </form>
        </div>
    </div>
</div>
@endsection
