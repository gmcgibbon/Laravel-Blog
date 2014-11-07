@extends('layouts.page')

@section('content')
	
	<h2>Edit Post</h2>

	{{ Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put']) }}

		<br>
		{{ Form::label('title', 'Title:') }}
		{{ Form::text ('title') }}
		<br>
		{{ Form::label('content', 'Content:') }}
		{{ Form::textarea ('content') }}
		<br>
		{{ Form::submit('Update') }}
		{{ link_to_post_route('post.delete', 'Delete', 'delete', true, ['id' => $post->id]) }}

	{{ Form::close() }}
	
	<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
	<script type="text/javascript">
		$("form textarea[name='content']").ckeditor();
	</script>
@stop