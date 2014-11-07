@extends('layouts.page')

@section('content')
	
	<h2>{{ ViewHelper::getPageName() }}</h2>

	@foreach ($posts as $post)
		@include('post.preview', ['post' => $post])
	@endforeach

@stop