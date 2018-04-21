<?php

/*	Unfortunately, this class turns out to be a lot messier than I
		thought it'd be. Here's the problem. By default, there is no way
		to apply the remove_all_filters() plugin on a page-by-page basis.
		Once you run that function, every piece of data from then on (for
		that particular page request) is going to not have any filter. So
		the only way to add the filter back is manually. So we're populating
		the $content_filters() array to see what's there by default, and then
		we're applying that to any article that's not been checked. Note that
		all of this could be avoided if the plugin only supported single blog
		posts and pages. But I wanted it to work on blog pages as well.
*/

Class View extends DMMM
{

	static $content_filters = array();

	static function populate_content_filters()
	{
		if (empty(self::$content_filters))
		{
			// these can be found in /wp-includes/default-filters.php
			array_push(self::$content_filters, 'wptexturize');
			array_push(self::$content_filters, 'convert_smilies');
			array_push(self::$content_filters, 'convert_chars');
			array_push(self::$content_filters, 'wpautop');
			array_push(self::$content_filters, 'shortcode_unautop');
			array_push(self::$content_filters, 'prepend_attachment');
		}
		return self::$content_filters;
	}

	static function add_view_filter()
	{
		add_filter( 'post_class', array( __CLASS__, 'remove_filter'));
	}

	static function remove_filter($content)
	{
		self::populate_content_filters();

		if ( Admin::checked() )
		{
			foreach (self::$content_filters as $filter)
			{
				/*
				Don't invoke remove_all_filters( 'the_content' ) because
				that will disable cool shortcodes such as contact form 7.
				Instead, just iterate through the loop like normal.
				*/
				remove_filter( 'the_content', $filter );
			}
		}
		else
		{
			foreach (self::$content_filters as $filter)
			{
				add_filter( 'the_content', $filter );
			}
		}

		return $content;
	}
}

