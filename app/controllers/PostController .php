<?php

/**
 * Post Controller
 * 
 * @author Gannon McGibbon
 * 
 * Blog post actions
 */
class PostController extends BaseController
{
	/**
	 * Constructor
	 */
	function __construct()
	{
		$this->validation = 
		[
			'title'   => 'required|min:1',
			'content' => 'required|min:1'
		];
	}

	/**
	 * Post show
	 * 
	 * @param id Post id to display
	 * 
	 * @return show view or index if not found
	 */
	public function show($id)
	{
		$post = Post::find($id);

		if (!is_null($post))
		{
			$view = View::make('post.show')
				->with(['post' => $post]);
		}
		else
		{
			$this->putError("Post {$id} could not be found!");

			$view = Redirect::route('page.index');
		}

		return $view;
	}

	/**
	 * Post create
	 * 
	 * @return create view
	 */
	public function create()
	{
		return View::make('post.create');
	}

	/**
	 * Post add
	 * 
	 * @return index view or back to create on error
	 */
	public function add()
	{
		$input = Input::all();

		if (parent::validate($input)->passes())
		{
			$post = Auth::user()->posts()->create($input);

			if ($post)
			{
				$this->putSuccess("Post {$post->id} created successfully!");
			}
			else
			{
				$this->putError('Post could not be created!');
			}

			$view = Redirect::route('page.index');
		}
		else
		{
			$this->putError('Post must have title and content of at least one letter!');

			$view = Redirect::back();
		}

		return $view;
	}

	/**
	 * Post edit
	 * 
	 * @param id Post id to edit
	 * 
	 * @return edit view or index if not found
	 */
	public function edit($id)
	{
		$post = Post::find($id);

		if (!is_null($post))
		{
			$view = View::make('post.edit')
				->with(['post' => $post]);
		}
		else
		{
			$this->putError("Post {$id} could not be found!");

			$view = Redirect::route('page.index');
		}
		
		return $view;
	}

	/**
	 * Post update
	 * 
	 * @param id Post id to update
	 * 
	 * @return index view or back to update on error
	 */
	public function update($id)
	{

		if (parent::validate(Input::all())->passes())
		{
			$post = Post::find($id);
			$post->title    = Input::get('title');
			$post->content  = Input::get('content');
			$post->touch();

			if ($post->save())
			{
				$this->putSuccess("Post {$id} has been updated!");
			}
			else
			{
				$this->putError("Post {$id} could not be updated!");
			}

			$view = Redirect::route('page.index');
		}
		else
		{
			$this->putError('Post must have title and content of at least one letter!');

			$view = Redirect::back();
		}

		return $view;
	}

	/**
	 * Post delete
	 * 
	 * @param id Post id to delete
	 * 
	 * @return index view
	 */
	public function delete($id)
	{
		$post = Post::find($id);

		if ($post->delete())
		{
			$this->putSuccess("Post {$id} has been deleted!");
		}
		else
		{
			$this->putError('Post {$id} could not be deleted!');
		}

		return Redirect::route('page.index');
	}
}
