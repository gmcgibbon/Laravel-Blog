<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('id', '[0-9]+');

// universal routes
Route::group([], function()
{
	Route::get('/', 
		[
			'as'   => 'page.index',
			'uses' => 'PageController@index'
		]);

	Route::get('/archive', 
		[
			'as'   => 'page.archive',
			'uses' => 'PageController@archive'
		]);

	Route::get('/post/show/{id}', 
		[
			'as'   => 'post.show',
			'uses' => 'PostController@show'
		]);
});

// guest routes
Route::group(['before' => 'auth.guest'], function()
{
	Route::get('/login', 
		[
			'as'   => 'page.login',
			'uses' => 'PageController@login'
		]);
	
	Route::post('/login',
		[
			'as'   => 'auth.login',
			'uses' => 'AuthController@login'
		]);
});

// user routes
Route::group(['before' => 'auth.user'], function()
{
	Route::delete('/logout',
		[
			'as'   => 'auth.logout',
			'uses' => 'AuthController@logout'
		]);

	Route::get('/post/create', 
		[
			'as'   => 'post.create',
			'uses' => 'PostController@create'
		]);

	Route::post('/post/add',
		[
			'as'   => 'post.add',
			'uses' => 'PostController@add'
		]);

	Route::get('/post/edit/{id}', 
		[
			'as'   => 'post.edit',
			'uses' => 'PostController@edit'
		]);

	Route::put('/post/update/{id}',
		[
			'as'   => 'post.update',
			'uses' => 'PostController@update'
		]);

	Route::delete('/post/delete/{id}',
		[
			'as'   => 'post.delete',
			'uses' => 'PostController@delete'
		]);
});
