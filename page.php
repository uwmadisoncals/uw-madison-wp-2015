<?php
/**
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

	

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="cf pagePadding">
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'content', 'page' ); ?>
	
				<?php endwhile; // end of the loop. ?>
				
				<?php 
					if ( !is_home() ) {
						
						$side_nav_settings = get_option( 'uw-madison-wp-2015_sidebar_options_id' );
						
						

						if($side_nav_settings == "simple-nav") {
							get_template_part('nav_menu', 'sidebar'); 
						} else {
							get_template_part('nav_menu', 'sidebar_expanded');
						}
					     
					}	  
				?>
			
			</div>
			
			<?php if(is_front_page()) { ?>
				<?php include('pagefeature.php'); ?>
			<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
