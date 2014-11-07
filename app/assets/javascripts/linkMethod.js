/**
 * Based on http://stackoverflow.com/a/23082278
 * 
 * Applies a click handler to all anchor tags that have a data method.
 * The handler cancels the link get action and posts a form to the 
 * specified href with a _method input of the specified data method
 * 
 * The form string appending was chosen over jQuery's post method 
 * due to $.post using an AJAX call and not properly redirecting
 */
$(function()
{
	$('a[data-method]').on('click', function(e)
	{
		var method = $(this).data('method');
		var verify = $(this).data('confirm');
		var target = $(this).attr('href');

		if (method.toLowerCase() != 'get')
		{
	        var form = 
	        "<form action='" + target + "' method='POST'>\n"+
	        "   <input type='hidden' name='_method' value='" + method + "'>\n"+
	        "</form>\n";

	        e.preventDefault();

	        var allowed =
	        	(verify && confirm('Are you sure?'))
	        	|| !verify;
	        
	        if (allowed)
	        {
	        	// $.post(target, { _method : method });
	        	$(form).appendTo('body').submit();
	        }
		}
   });
});