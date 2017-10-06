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

			
				
				<?php while ( have_posts() ) : the_post(); ?>
						<?php
							
							$editor = get_field('page_editor');
							//$navhidden = get_field('hide_the_side_navigation');
							//$showwidgets = get_field('show_page_widgets');
							
							if($editor != 'advanced') {  ?>
							
								  <div class="site-content-inner">

									<div id="primary" class="content-area <?php $image = get_field('hero_image_pages'); if($image) { echo "heroImage"; } ?>">
										<main id="main" class="site-main" role="main">
											<div class="cf pagePadding">
								 

							<?php } ?>

						
						<?php if(get_field('page_theme') == "documentation") { ?>
							<div class="docLoadBar"></div>
							<div class="documentationSideBar">
								<?php get_template_part('nav_menu', 'sidebar_expanded_docs'); ?>
								<?php wp_reset_query(); ?>
							</div>
						<?php } ?>

						<div class="documentationMain" id="docContent">
						
						<?php
							
							$editor = get_field('page_editor');
							$navhidden = get_field('hide_the_side_navigation');
							$showwidgets = get_field('show_page_widgets');
							
							if($editor == 'advanced') { 
								
								
								if(get_field('hero_image_pages')) { ?>
									<div class="heroWatermark">
										
										<?php 
			
										$image = get_field('hero_image_pages');
										$size = 'full'; // (thumbnail, medium, large, full or custom size)
										
										if( $image ) { ?>
										
											<?php echo wp_get_attachment_image( $image, $size ); ?>
										
											<div class="whiteBlend">
													<svg width="473px" height="285px" viewBox="0 0 473 285" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" preserveAspectRatio="none">
													<title>blendwatermark</title>
													<desc>Created with Sketch.</desc>
													<defs>
														<radialGradient cx="50%" cy="11.3342605%" fx="50%" fy="11.3342605%" r="82.2567483%" width="100%" id="radialGradient-1">
															<stop stop-color="#<?php background_color(); ?>" stop-opacity="0.7" offset="0%"></stop>
															<stop stop-color="#<?php background_color(); ?>" offset="100%"></stop>
														</radialGradient>
													</defs>
													<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
														<g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-554.000000, -372.000000)" fill="url(#radialGradient-1)">
															<rect id="blendwatermark" sketch:type="MSShapeGroup" x="554" y="372" width="473" height="285"></rect>
														</g>
													</g>
													</svg>
											</div>
			
											
										
										
										
										
											<?php } //completed check for editor type ?>
										</div>
										
										
									<?php } 
								
								if(!$navhidden || $showwidgets) {
							?>
								<div class="site-content-inner">
							   <div class="advancedPageEditorGroup apewithSidebar">
								   
								   <?php } else { ?>
								    <div class="advancedPageEditorGroup">
								   <?php } ?>
								<?php 

							 
							
							$breadcrumb_settings = get_theme_mod( 'uw-madison-wp-2015_breadcrumbs_id' );
							
							
							if($breadcrumb_settings == "shown") {
								
								 get_template_part('breadcrumb', 'menu'); 
							}
						
								// check if the flexible content field has rows of data
								if( have_rows('page_content_options') ) {
									
								 	// loop through the rows of data
								    while ( have_rows('page_content_options') ) : the_row();
								
										/********  CONTENT LAYOUTS   ********/
								
										// check current row layout
								        if( get_row_layout() == 'full_width' ) { ?>
											<?php include 'page_editor_templates/full_width_layouts.php'; ?>

										<?php	/********  2 Columns   ********/
								         } else if( get_row_layout() == '2_column (50/50)' ) { ?>
											<?php include 'page_editor_templates/two_column_layouts.php'; ?>
											
								        	<?php 
											
											 /********  3 Columns   ********/
								        } else if( get_row_layout() == '3_column' ) { ?>

											<?php include 'page_editor_templates/three_column_layouts.php'; ?>

										
								        	<?php 
											 
											} 
								
								    endwhile; ?>
										
							   		</div>
									

									<?php if($editor == 'advanced') {  
								if(!$navhidden || $showwidgets) { ?>
									</div>
									
								   
								   <?php } else { ?>
								  
								   <?php } 
								   }?>

								<?php } else { // no layouts found ?>
									<h1>You should add some content.</h1>
									
							   
							   <?php } //close off check for advanced editor ?>
							   
							   
							<?php } else { ?>
							
						
						<?php if(get_field('hero_image_pages')) { ?>
						<div class="heroWatermark">
							
							<?php 

							$image = get_field('hero_image_pages');
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							
							if( $image ) { ?>
							
								<?php echo wp_get_attachment_image( $image, $size ); ?>
							
								<div class="whiteBlend">
										<svg width="473px" height="285px" viewBox="0 0 473 285" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" preserveAspectRatio="none">
									    <title>blendwatermark</title>
									    <desc>Created with Sketch.</desc>
									    <defs>
									        <radialGradient cx="50%" cy="11.3342605%" fx="50%" fy="11.3342605%" r="82.2567483%" width="100%" id="radialGradient-1">
									            <stop stop-color="#<?php background_color(); ?>" stop-opacity="0.7" offset="0%"></stop>
									            <stop stop-color="#<?php background_color(); ?>" offset="100%"></stop>
									        </radialGradient>
									    </defs>
									    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
									        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-554.000000, -372.000000)" fill="url(#radialGradient-1)">
									            <rect id="blendwatermark" sketch:type="MSShapeGroup" x="554" y="372" width="473" height="285"></rect>
									        </g>
									    </g>
										</svg>
								</div>

								
							
							
							
							
								<?php } //completed check for editor type ?>
							</div>
							
							
						<?php } ?>
						
						<?php 
							
							$breadcrumb_settings = get_theme_mod( 'uw-madison-wp-2015_breadcrumbs_id' );
							
							
							if($breadcrumb_settings == "shown") {
								
								 get_template_part('breadcrumb', 'menu'); 
							}
						?>
					
						
				
					<?php get_template_part( 'content', 'page' ); ?>
					
					
					<?php } ?>
				 </div>
				<?php endwhile; // end of the loop. ?>
								
				<?php 
					if ( !is_home() ) {
						if(get_field('page_theme') != "documentation") {
						if( !get_field('hide_the_side_navigation')) {
							$side_nav_settings = get_option( 'uw-madison-wp-2015_sidebar_options_id' );
	
							if($side_nav_settings == "simple-nav") {
								get_template_part('nav_menu', 'sidebar'); 
							} else {
								get_template_part('nav_menu', 'sidebar_expanded');
							}

					    }
					    
					    //$editor = get_field('page_editor');
						//if($editor == 'default') {

						    if( get_field('show_page_widgets')) {
						    	if ( is_active_sidebar( 'page-sidebar-1' ) ) : ?>
									<div class="sidebar_menu page-widget-sidebar">
										<?php dynamic_sidebar( 'page-sidebar-1' ); ?>
									</div>
								<?php endif;  
						    }
					    
					    //}
						}
					}	  
				?>
				
				<?php
							
							//$editor = get_field('page_editor');
							//$navhidden = get_field('hide_the_side_navigation');
							//$showwidgets = get_field('show_page_widgets');
							
							if($editor != 'advanced') {  ?>
								</div>
								</main>
								</div>
								</div>

							
								
							<?php } ?>
			
		<!--	</div>-->

	<!--	</main> --><!-- #main -->
	<!-- </div> --><!-- #primary -->

<!--</div>--><!-- .site-content-inner -->
<?php get_footer(); ?>
