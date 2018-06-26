<?php
/**
 * The template for displaying all single posts.
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>
<div class="site-content-inner">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="cf postPadding">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single_meeting' ); ?>





				<?php endwhile; // end of the loop. ?>
			</div>
		</main>
	</div>

<?php //get_sidebar(); ?>
</div><!-- .site-content-inner -->
<?php get_footer(); ?>
