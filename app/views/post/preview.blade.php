<?php
	$title   = $post->title;
	$created = $post->created_at;
	$content = strip_tags($post->content);
	$trunc   = strlen($content) > 200;
?>
<article>
	<h3>
		{{ link_to_route('post.show', $title, $post->id) }}
	</h3>
	<p>{{ $created }}</p>
	@if ($trunc)
		<p>
			{{ substr($content, 0, 200) }}... 
			{{ link_to_route('post.show', 'Read More!', $post->id) }}
		</p>
	@else
		<p>{{ $content }}</p>
	@endif

	@if (Auth::check())
		{{ link_to_route('post.edit', 'Edit', $post->id) }}
	@endif
</article>