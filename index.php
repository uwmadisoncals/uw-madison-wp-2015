<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>
<div class="site-content-inner">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php $home_layout_settings = get_theme_mod( 'uw-madison-wp-2015_layout_id' );
					
					if(!$home_layout_settings) {
						include('spotlight.php');
										
					} else {
						if($home_layout_settings == "circles") {
							include('spotlight.php');
						} else if($home_layout_settings == "tiles") {
							include('spotlight_tiles.php');
						} else if($home_layout_settings == "left_sidebar") {

							include('spotlight_left-sidebar.php');
						} else if($home_layout_settings == "right_sidebar") {
							
							include('spotlight_right-sidebar.php');
						}

					}
				?>
			
				
							
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .site-content-inner -->
<?php get_footer(); ?>
