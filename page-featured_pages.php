<?php
/**
 * Template Name: Featured Pages
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
						
						<?php 
							
							$breadcrumb_settings = get_theme_mod( 'uw-madison-wp-2015_breadcrumbs_id' );
							
							
							if($breadcrumb_settings == "shown") {
								
								 get_template_part('breadcrumb', 'menu'); 
							}
						?>
					
				
				    
				
					<?php get_template_part( 'content', 'page_featured_pages' ); ?>
	
				<?php endwhile; // end of the loop. ?>
				
				<?php 
					if ( !is_home() ) {
						
						if( !get_field('hide_the_side_navigation')) {
							$side_nav_settings = get_option( 'uw-madison-wp-2015_sidebar_options_id' );
	
							if($side_nav_settings == "simple-nav") {
								get_template_part('nav_menu', 'sidebar'); 
							} else {
								get_template_part('nav_menu', 'sidebar_expanded');
							}
					    }
					}	  
				?>
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php get_footer(); ?>
