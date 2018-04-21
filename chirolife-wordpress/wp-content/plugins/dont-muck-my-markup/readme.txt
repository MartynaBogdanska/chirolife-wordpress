=== Don't Muck My Markup ===
Contributors: Martyn Chamberlin
Tags: remove markup, disable auto formatting, default formatting, wpautop
Requires at least: 3.9
Tested up to: 4.9
Stable tag: 4.9

Don't Muck My Markup lets you disable all auto-generated HTML markup from your posts and pages on a page-by-page basis.

== Description ==

If you've ever had a WordPress blog post or page in which you found yourself writing more than a little HTML, you've experienced the frustration of finding your beautiful markup surrounded in `<p>` tags. The problem only gets worse when you start throwing jQuery into the mix. Who on earth gave WordPress permission to throw in `<br/>` tags inside a `<script>`, anyhow?!

Up until now, we've only had a couple of options:

- First, we could use conditional logic to require an external PHP file. This was bad for several reasons.
  - It's not friendly for the end user. Who wants to have to edit a PHP file?
  - The content is not in the WordPress database, which means it isn't searchable inside the dashboard, and it isn't backed up with the rest of the site.
  - It removes framework functionality. Robust WordPress frameworks have places to add content above and below the main post content area, and an external PHP file destroys this greatly.
- The second option is to use the existing plugins to disable WordPress formatting, but none of these plugins empower the user to toggle this setting on a page-by-page basis. After all, most articles don't have that much `HTML` in them. Nobody wants to go through 500 old blog posts and manually add `<p>` tags to them, do they? We didn't think so either.

As a web designer that's used WordPress successfully for several years, I finally decided these shenanigans had to stop once and for good. I built a simple but elegant plugin that lets you disable auto-generated HTML on a page-by-page basis.

I hope you use and enjoy __Don't Muck My Markup__ as much as I enjoyed building it.

*Note: this plugin does not work on all WordPress themes, because some themes don’t handle the filter sequence correctly. This plugin __does__ work for well-programmed themes such as the Twenty Fourteen theme and the Genesis Framework (and child themes).*

== Installation ==

1. Upload this plugin to your plugins directory (wp-content/plugins/).
2. Activate this plugin.
3. Head over to the Edit Post interface for the specific page for which you want to disable WordPress' auto-formatting.
4. In the right sidebar underneath the "Featured Image" box, toggle the checkbox labeled, "Disable auto-formatting for this page/post."
5. Update the page/post.
6. To disable formatting across all pages and posts, head over to Tools -> Don’t Muck My Markup.
7. Enjoy your newfound control!

== Changelog ==

= 1.7 =
- PHP 4 style constructors (methods that have the same name as the class they are defined in) are deprecated in PHP 7, and this update fixes the warning about this that you get when you've set `define('WP_DEBUG', true);` in your `wp-config.php` file.

= 1.6 =
- Minor wording change on the settings page to clarify the user options
- Tested with latest version of WordPress, v4.6.1

= 1.5 =
- Added the full opening to <?php tags to accommodate old servers.
- Tested with latest version of WordPress, v4.4.2

= 1.4 =
- Adding a new feature that allows users to disable auto formatting across their entire site with the click of a button.


= 1.3 =
- Buxfixes
  - Updated function as static in main file.
  - Checked for is_post() before getting post ID to determine if a given page load should be un-mucked or not.
  - Update the description because parts of it were sounding a little archaic.

= 1.2 =
- Bugfixes
  - Discovered that autosaving was what messed everything up. When a post autosaves, custom meta boxes get reset unless you provision this. Finally bug free.

= 1.1 =
- Bugfixes
  - Added white space so that checked="checked" should no longer be buggy
