@extends('layout.app')

@section('page-title', $thread->subject)
@section('title', 'Message')

@section('left-sidenav')
  <p><a href="/messages" class="btn btn-primary btn-block">Back to Messages</a></p>
@endsection

@section('body')
	@each('messenger.partials.messages', $thread->messages, 'message')
	@include('messenger.partials.form-message')
@endsection
