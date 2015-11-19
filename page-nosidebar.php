<?php
/**
 * Template Name: No Sidebar
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>

	

	<div id="primary" class="content-area leftSidebar-template">
		<main id="main" class="site-main" role="main">
			<div class="cf pagePadding">
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'content', 'page' ); ?>
	
				<?php endwhile; // end of the loop. ?>
				
				
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php get_footer(); ?>
