<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

	              		<a>&copy; <?php echo date("Y"); ?> ChiroLife</a>
	              		<a href="https://chirolife-bodensee.de/de/impressum/">Impressum</a>
	              		<a href="https://chirolife-bodensee.de/de/datenschutz/">Datenschutz</a>
	              		<a href="https://chirolife-bodensee.de/de/site-map/">Sitemap</a>
	              		<a href="http://martyna-bogdanska.com">Designed by MB</a>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
