@extends('layouts.page')

@section('content')
	
	<h2>404 Not Found</h2>

	<div>
		<p>Resource "{{ Request::path() }}" does not exist or is invalid!</p>
		<br>
		<p>{{ link_to(URL::previous(), 'Home') }}</p>
	</div>

@stop