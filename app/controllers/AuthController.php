<?php

/**
 * Authentication Controller
 *
 * @author Gannon McGibbon
 * 
 * RESTful authentication
 */
class AuthController extends BaseController
{
	/**
	 * Login using passed username and password
	 * 
	 * @return index view if successful, login view if not
	 */
	public function login()
	{
		$email    = Input::get('email');
		$password = Input::get('password');
		
		if (Auth::attempt(['email' => $email, 'password'=> $password]))
		{
			$this->putSuccess("Welcome {$email}!");

			$view = Redirect::route('page.index');
		}
		else
		{
			$this->putError('Username and/or password are incorrect!');

			$view = Redirect::route('page.login');
		}

		return $view;
	}

	/**
	 * Logout of current user session
	 * 
	 * @return index view
	 */
	public function logout()
	{
		Auth::logout();

		if (Auth::guest())
		{
			$this->putSuccess("User successfully signed out!");
		}
		else
		{
			$this->putError("User could not be signed out!");
		}

		return Redirect::route('page.index');
	}

}
