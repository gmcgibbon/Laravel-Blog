@extends('layouts.page')

@section('content')
	
	<h2>{{ ViewHelper::getPageName() }}</h2>

	{{ Form::open(['route' => 'auth.login']) }}
		<br>
		{{ Form::label('email', 'Email:') }}
		{{ Form::text ('email') }}
		<br>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password ('password') }}
		<br>
		{{ Form::submit ('Login') }}
	{{ Form::close() }}

@stop