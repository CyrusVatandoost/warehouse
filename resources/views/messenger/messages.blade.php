@extends('layout.app')

@if(Auth::check())
  @section('title', 'Home')
@endif

@section('left-sidenav')
  <p><a href="/messages/create" class="btn btn-primary btn-block">New Message</a></p>
@endsection

@section('body')
    @include('messenger.partials.flash')
    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
@stop

@section('right-sidenav')

@endsection
