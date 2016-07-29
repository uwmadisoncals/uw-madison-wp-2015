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
	<div class="site-content-inner">

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
					
						
						if( !get_field('hide_the_side_navigation')) {
							$side_nav_settings = get_option( 'uw-madison-wp-2015_sidebar_options_id' );
							
							if(get_field('featured_pages_layouts') == "listr") { ?>

								<div class="spotlight right-sidebar spotlight-page">
								<div class="sidebarWrapper">
								<?php if ( is_active_sidebar( 'page-sidebar-1' ) ) { ?>
									<div class="sidebarfold">
										<svg width="38px" height="33px" viewBox="0 0 38 33" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										    <!-- Generator: Sketch 3.7.2 (28276) - http://www.bohemiancoding.com/sketch -->
										    <title>sidebar_fold</title>
										    <desc>Created with Sketch.</desc>
										    <defs></defs>
										    <g id="Home-page" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <g id="Sub-Page" transform="translate(-970.000000, -233.000000)" fill="#91222F">
										            <g id="sidebar" transform="translate(970.000000, 232.000000)">
										                <polygon id="sidebar_fold" points="31.4492188 0.9375 0.130661505 33.2574997 37.1620868 33.2574997"></polygon>
										            </g>
										        </g>
										    </g>
										</svg>
									</div>
									
									<div id="secondary" class="widget-area">
										<?php dynamic_sidebar( 'page-sidebar-1' ); ?>
									</div>
								<?php } else if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
									<div class="sidebarfold">
										<svg width="38px" height="33px" viewBox="0 0 38 33" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										    <!-- Generator: Sketch 3.7.2 (28276) - http://www.bohemiancoding.com/sketch -->
										    <title>sidebar_fold</title>
										    <desc>Created with Sketch.</desc>
										    <defs></defs>
										    <g id="Home-page" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <g id="Sub-Page" transform="translate(-970.000000, -233.000000)" fill="#91222F">
										            <g id="sidebar" transform="translate(970.000000, 232.000000)">
										                <polygon id="sidebar_fold" points="31.4492188 0.9375 0.130661505 33.2574997 37.1620868 33.2574997"></polygon>
										            </g>
										        </g>
										    </g>
										</svg>
									</div>
									<?php get_sidebar(); ?>
								<?php } ?>
									</div>
							<?php }
							
							if($side_nav_settings == "simple-nav") {
								get_template_part('nav_menu', 'sidebar'); 
							} else {
								get_template_part('nav_menu', 'sidebar_expanded');
							} ?>
								<?php if(get_field('featured_pages_layouts') == "listr") { ?>
									</div>
								<?php } ?>
					   <?php }
						  
				?>
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	</div><!-- .site-content-inner -->
<?php get_footer(); ?>
