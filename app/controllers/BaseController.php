<?php

/**
 * Base Controller
 *
 * @author Gannon McGibbon
 * 
 * Inherit common code
 */
class BaseController extends Controller
{
	// controller wide model validation array
	protected $validation;

	/**
	 * Session error helper
	 * 
	 * @return void
	 */
	protected function putError($message)
	{
		Session::put('error', $message);
	}

	/**
	 * Session info helper
	 * 
	 * @return void
	 */
	protected function putInfo($message)
	{
		Session::put('info', $message);
	}

	/**
	 * Session success helper
	 * 
	 * @return void
	 */
	protected function putSuccess($message)
	{
		Session::put('success', $message);
	}

	/**
	 * Model validation helper
	 * 
	 * @param input hash attributes to validate
	 */
	protected function validate($input)
	{
		return Validator::make($input, $this->validation);
	}

	/**
	 * Setup the layout used by the controller
	 * 
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
}
