@extends('layouts.page')

@section('content')

	<h2>New Post</h2>

	{{ Form::open(['route' => 'post.add']) }}
		<br>
		{{ Form::label('title', 'Title:') }}
		{{ Form::text ('title') }}
		<br>
		{{ Form::label('content', 'Content:') }}
		{{ Form::textarea ('content') }}
		<br>
		{{ Form::submit ('Create') }}
	{{ Form::close() }}

	<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
	<script type="text/javascript">
		$("form textarea[name='content']").ckeditor();
	</script>
@stop