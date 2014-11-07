<?php

/**
 * View Helper
 * 
 * Helper methods for views
 */
class ViewHelper
{
	/**
	 * Get current action name
	 * 
	 * @return string action name
	 */
	private static function getActionName()
	{
		$action = Route::currentRouteAction();

		return substr($action, strpos($action, '@') +1);
	}
	
	/**
	 * Get current page name
	 * 
	 * @return string page name
	 */
	public static function getPageName()
	{
			$actionName = ucfirst(self::getActionName());

			// special cases
			switch ($actionName)
			{
				case '':
					$actionName = 'Error';
					break;
				case 'Index':
					$actionName = 'Home';
					break;
			}

			return $actionName;
	}
	
	/**
	 * Get current page title
	 * 
	 * @return string page title
	 */
	public static function getPageTitle()
	{
		return self::getPageName() 
			. ' \\\\ ' . APP_NAME;
	}
}

	