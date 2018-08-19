<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="row">

		<div class="col-md-8">

			<header class="entry-header">

				<?php the_title( sprintf( '<h3 class="entry-title mb-2"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h3>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->


			<div class="entry-content">

				<?php
				the_excerpt();
				?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>

			</div><!-- .entry-content -->

			<footer class="entry-footer mb-2">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</div>

		<div class="col-md-4">

			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		</div>

	</div>



</article><!-- #post-## -->
