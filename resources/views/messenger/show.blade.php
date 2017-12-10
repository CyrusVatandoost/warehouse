@extends('layout.app')

@section('page-title', $thread->subject)
@section('title', 'Message')

@section('body')
	@each('messenger.partials.messages', $thread->messages, 'message')

	@include('messenger.partials.form-message')

@endsection
