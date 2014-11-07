<?php
	$title   = $post->title;
	$created = $post->created_at;
	$updated = $post->updated_at;
	$content = $post->content;
?>

@extends('layouts.page')

@section('content')
	<article>
		<h2>{{ $title }}</h2>
		<p>{{ $created }}</p>
		@if (Auth::check())
			<p>{{ link_to_route('post.edit', 'Edit', $post->id) }}</p>
		@endif
		
		<br>
		{{ $content }}
		<br>

		@if ($created != $updated)
			<p>Last Updated: {{ $updated }}</p>
		@endif
	</article>
@stop