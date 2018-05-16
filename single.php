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

					<?php get_template_part( 'content', 'single' ); ?>

					<?php the_post_navigation(); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>
			</div>
		</main>
	</div>

<?php get_sidebar(); ?>
</div><!-- .site-content-inner -->
<?php get_footer(); ?>
