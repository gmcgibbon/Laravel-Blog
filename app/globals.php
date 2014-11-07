<?php
	
// ---- Shared Constants ----

const APP_NAME    = "My Blog";

const DATE_FORMAT = "F d, Y, h:i A";

// ---- Shared Functions ----

/**
 * Link to a post route
 * 
 * @param route post route string
 * @param title text string in anchor tag
 * @param method HTTP method name string, default 'post'
 * @param confirm Display confirm message if true, 
 * 				  do nothing if false, default false
 * @param params Route parameters to pass, default []
 * @param attributes anchor tag link attributes, default []
 * 
 * @return markup link anchor tag string from route
 */
function link_to_post_route($route, $title, $method = 'post', $confirm = false, $params = array(), $attributes = array())
{
	$attributes['data-method']  = $method;
	$attributes['data-confirm'] = $confirm ? 'true' : 'false';

	return link_to(route($route, $params), $title, $attributes);
}

?>