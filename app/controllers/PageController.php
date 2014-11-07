<?php

/**
 * Page Controller
 * 
 * @author Gannon McGibbon
 * 
 * Page actions
 */
class PageController extends BaseController
{
	/**
	 * Index page
	 * 
	 * @return index/root view
	 */
	public function index()
	{
		// first 5 posts in reverse chronological order
		$posts = Post::orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->get()->take(5);

		return View::make('page.index')
			->with(['posts' => $posts]);
	}

	/**
	 * Login page
	 * 
	 * @return login view
	 */
	public function login()
	{
		return View::make('page.login');
	}

	/**
	 * Archive page
	 * 
	 * @return archive view
	 */
	public function archive()
	{
		// all posts in reverse chronological order
		$posts = Post::orderBy('created_at', 'desc')
			->orderBy('id', 'desc')
			->get();

		return View::make('page.archive')
			->with(['posts' => $posts]);
	}
}
