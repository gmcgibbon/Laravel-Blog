<nav>
	<ul>
		<li>{{ link_to_route('page.index', 'Home') }}</li>
		<li>{{ link_to_route('page.archive', 'Archive') }}</li>

		@if (Auth::check())
			<li>{{ link_to_route('post.create', 'Add Post') }}</li>
			<li>{{ link_to_post_route('auth.logout', 'Logout', 'delete') }}</li>
		@else
			<li>{{ link_to_route('auth.login', 'Login') }}</li>
		@endif
	</ul>
</nav>