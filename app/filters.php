<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

App::missing(function($exception)
{
	return App::error(function($exception){});
});

App::error(function($exception)
{
	if (Request::ajax())
	{
		return Response::make('Not Found', 404);
	}
	else if (!Config::get('app.debug')) // allow errors in debug
	{
		//return Redirect::route('page.index');
    	return Response::view('error.404', [],  404);
	}
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth.user', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			$resp = Response::make('Unauthorized', 401);
		}
		else
		{
			Session::put('info', "Authentication is required for administration!");

			$resp = Redirect::guest('login');
		}

		return $resp;
	}
});

Route::filter('auth.guest', function()
{
	if (Auth::user())
	{
		if (Request::ajax())
		{
			$resp = Response::make('Forbidden', 403);
		}
		else
		{
			Session::put('info', "User already authenticated!");

			$resp = Redirect::route('page.index');
		}

		return $resp;
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
