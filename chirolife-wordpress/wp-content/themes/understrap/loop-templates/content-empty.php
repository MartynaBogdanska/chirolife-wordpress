<?php
/**
 * Content empty partial template.
 *
 * @package understrap
 */

 ?>

<div class="wrapper page-title pb-0">
    <div class="container" id="content">
     	<header class="entry-header">

     		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

     	</header><!-- .entry-header -->
    </div>
</div>

<?php
the_content();
?>
