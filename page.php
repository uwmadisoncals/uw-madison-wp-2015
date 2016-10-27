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
<div class="site-content-inner">

	<div id="primary" class="content-area <?php $image = get_field('hero_image_pages'); if($image) { echo "heroImage"; } ?>">
		<main id="main" class="site-main" role="main">
			<div class="cf pagePadding">
				<div class="testDiv"></div>
				<?php while ( have_posts() ) : the_post(); ?>
						
						
						
						
						<?php
							
							$editor = get_field('page_editor');
							if($editor == 'advanced') {
								
								// check if the flexible content field has rows of data
								if( have_rows('page_content_options') ) {
								
								 	// loop through the rows of data
								    while ( have_rows('page_content_options') ) : the_row();
								
										/********  CONTENT LAYOUTS   ********/
								
										// check current row layout
								        if( get_row_layout() == 'full_width' ) {
											
											
											if( have_rows('full_width_content_options') ) {
												
												while ( have_rows('full_width_content_options') ) : the_row();
												
													 $offsetC = get_sub_field('appearance_options'); 
													 
													 if( get_row_layout() == 'fw_highlighted_content' ) {
														 if(have_rows("fw_highlighted_content_type")) { ?>
														
														 	<div class="gridtwocol gridstyle2">
															 	

	
  
	
															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															  
															<?php if($offsetC == "offset") { ?>	  
			<div class="grid-item2col grid-itemspacer stamp"></div>		
			<?php } ?>


														 	<?php while ( have_rows('fw_highlighted_content_type') ) : the_row();
														  
																  



																if(get_row_layout() == 'fw_latest_posts') {
																	
																	$numofposts = get_sub_field('fw_number_of_posts');
																	
																	// The Query
																	$query1 = new WP_Query( array( 'posts_per_page' => $numofposts ) ); ?>
																	
																	
																	
																	<?php if ( $query1->have_posts() ) {
																		// The Loop ?>
																		
																																				
																		<?php while ( $query1->have_posts() ) { $query1->the_post(); ?> 
																			
																			<div class="grid-item2col">
																				
																			
																				
																			<div class="tiltWrapper custom custom2col" data-maxangle="3" data-tiltdepth="70">
		  
																				<a href="<?php the_permalink(); ?>" class="tiltAction"><?php the_title(); ?></a>
																				
																				<div class="tiltPanel">
																					
																					
																							
																					
																					
																					<div class="plane level1">
																						<div class="reflection">
																							<svg width="130px" height="130px" viewBox="0 0 130 130" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
																							    <!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
																							    <title>glare</title>
																							    <desc>Created with Sketch.</desc>
																							    <defs>
																							        <radialGradient cx="50%" cy="50%" fx="50%" fy="50%" r="50%" id="radialGradient-1">
																							            <stop stop-color="#FFFFFF" stop-opacity="0.458786232" offset="0%"></stop>
																							            <stop stop-color="#FFFFFF" stop-opacity="0" offset="100%"></stop>
																							        </radialGradient>
																							    </defs>
																							    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
																							        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -322.000000)" fill="url(#radialGradient-1)">
																							            <circle id="glare" sketch:type="MSShapeGroup" cx="491" cy="387" r="65"></circle>
																							        </g>
																							    </g>
																							</svg>
																						</div>
																					
																											
																						
																	
																						<div class="backgroundImageSample">
																							<div class="cardStyles"><svg width="381px" height="379px" viewBox="0 0 381 379" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
																	    <!-- Generator: Sketch 3.4.2 (15855) - http://www.bohemiancoding.com/sketch -->
																	    <title>card_styles</title>
																	    <desc>Created with Sketch.</desc>
																	    <defs>
																	        <linearGradient x1="42.1905898%" y1="41.6499891%" x2="54.3044576%" y2="71.7731228%" id="linearGradient-1">
																	            <stop stop-color="#686868" stop-opacity="0.395833333" offset="0%"></stop>
																	            <stop stop-color="#545454" stop-opacity="0.658203125" offset="100%"></stop>
																	        </linearGradient>
																	        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-2">
																	            <stop stop-color="#FFFFFF" stop-opacity="0" offset="0%"></stop>
																	            <stop stop-color="#FFFFFF" stop-opacity="0.255151721" offset="100%"></stop>
																	        </linearGradient>
																	    </defs>
																	    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
																	        <g id="card_styles" sketch:type="MSLayerGroup">
																	            <g id="Page-1" sketch:type="MSShapeGroup">
																	                <g id="Desktop-HD">
																	                    <g id="card_styles">
																	                        <path d="M0.953125,378.058594 L0.953125,246.631883 L316.628906,341.71875 L0.953125,378.058594 L0.953125,378.058594 Z" id="Path-2" opacity="0.75886194" fill="url(#linearGradient-1)"></path>
																	                        <path d="M0.500197037,377.763682 L380.500197,377.763682 L380.500197,296 L0.500197037,377.763682 L0.500197037,377.763682 Z" id="Path-1" fill="#FFFFFF"></path>
																	                        <path d="M380.500197,275.894531 L380.500197,0.0606841001 L1.13333794,0.0606841001 L0.500197037,155.734375 L380.500197,275.894531 Z" id="Path-3" opacity="0.45598181" fill="url(#linearGradient-2)"></path>
																	                    </g>
																	                </g>
																	            </g>
																	        </g>
																	    </g>
																	</svg></div>
																	
																						</div>
																						
																						
																							
																							<?php if ( has_post_thumbnail() ) { 
																								
																			
																							?>
																							<svg class="heroImageContainerSVG highlightContentBlur" aria-label="Featured Image">

									<!-- Definition of a mask begins -->
							        <defs>
							            <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">
										    <linearGradient id="g" gradientUnits="objectBoundingBox" x2="0" y2="1">
										        <stop stop-color="white" stop-opacity="1" offset="0"/>
										        <stop stop-color="white" stop-opacity="1" offset="0.6"/>
										        <stop stop-color="white" stop-opacity="0.7" offset="0.9"/>
										        <stop stop-color="white" stop-opacity="0" offset="1"/>
										    </linearGradient>
										    <rect width="100%" height="100%" fill="url(#g)"/>
										</mask>
							        </defs>
								
									<foreignObject width="100%" height="100%" style="mask: url(#mask); ">
								
								<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php the_post_thumbnail_url('medium') ?>); background-size: cover; background-position: center center; "></div></div>

								
								</foreignObject>
								</svg>
																								  <?php the_post_thumbnail('medium'); ?>
																							<?php } 
																								else{ ?>
																								
														<svg class="heroImageContainerSVG highlightContentBlur" aria-label="Featured Image">

									<!-- Definition of a mask begins -->
							        <defs>
							            <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">
										    <linearGradient id="g" gradientUnits="objectBoundingBox" x2="0" y2="1">
										        <stop stop-color="white" stop-opacity="1" offset="0"/>
										        <stop stop-color="white" stop-opacity="1" offset="0.6"/>
										        <stop stop-color="white" stop-opacity="0.7" offset="0.9"/>
										        <stop stop-color="white" stop-opacity="0" offset="1"/>
										    </linearGradient>
										    <rect width="100%" height="100%" fill="url(#g)"/>
										</mask>
							        </defs>
								
									<foreignObject width="100%" height="100%" style="mask: url(#mask); ">
								
								<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg); background-size: cover; background-position: center center; "></div></div>

								
								</foreignObject>
								</svg>
																									<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
																								<?php }
																							?>
																							
																							
																							
																							
																						</div>
																			
																						
																					</div>
																					<div class="textContent">
																					<div>
																						<div class="middleImageSample">
																							<div class="whiteContent">
																								<div class="dateposted"><?php the_time('M') ?> <?php the_time('jS') ?></div>
																								<div class="numericdate"><?php the_time('Ymd'); ?></div>
																								<h2><?php the_title(); ?></h2>
																								<div class="excerpt"><?php the_excerpt(); ?></div>
																								
																																									
																								
																							</div>
																							
																						</div>
																					</div>
																				</div>
																				</div>
																				
																			</div>
																		<?php }
																		
																		
																		wp_reset_postdata();
																	}
																	
																}
																
																if(get_row_layout() == 'fw_posts_by_category') {
																	
																	
																	$terms = get_sub_field('fw_highlighted_category');
																	$categories = 0;
																	
																	if( $terms ): ?>
																	
																		<?php 
																			
																			foreach( $terms as $term ): 
																			$categories = $categories.",".$term;	

																		endforeach; ?>

																	<?php endif; 
																	
																	
																	$numofposts = get_sub_field('fw_cat_number_of_posts');
																	
																	// The Query
																	$query1 = new WP_Query( array( 'posts_per_page' => $numofposts, 'cat' => $categories ) );
																	
																	if ( $query1->have_posts() ) {
																		// The Loop
																		while ( $query1->have_posts() ) { $query1->the_post(); ?>
																			<div class="grid-item2col">
																				
																			
																				
																			<div class="tiltWrapper custom custom2col" data-maxangle="3" data-tiltdepth="70">
		  
																				<a href="<?php the_permalink(); ?>" class="tiltAction"><?php the_title(); ?></a>
																				
																				<div class="tiltPanel">
																					
																					
																							
																					
																					
																					<div class="plane level1">
																						<div class="reflection">
																							<svg width="130px" height="130px" viewBox="0 0 130 130" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
																							    <!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
																							    <title>glare</title>
																							    <desc>Created with Sketch.</desc>
																							    <defs>
																							        <radialGradient cx="50%" cy="50%" fx="50%" fy="50%" r="50%" id="radialGradient-1">
																							            <stop stop-color="#FFFFFF" stop-opacity="0.458786232" offset="0%"></stop>
																							            <stop stop-color="#FFFFFF" stop-opacity="0" offset="100%"></stop>
																							        </radialGradient>
																							    </defs>
																							    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
																							        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -322.000000)" fill="url(#radialGradient-1)">
																							            <circle id="glare" sketch:type="MSShapeGroup" cx="491" cy="387" r="65"></circle>
																							        </g>
																							    </g>
																							</svg>
																						</div>
																					
																											
																						
																	
																						<div class="backgroundImageSample">
																							<div class="cardStyles"><svg width="381px" height="379px" viewBox="0 0 381 379" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
																	    <!-- Generator: Sketch 3.4.2 (15855) - http://www.bohemiancoding.com/sketch -->
																	    <title>card_styles</title>
																	    <desc>Created with Sketch.</desc>
																	    <defs>
																	        <linearGradient x1="42.1905898%" y1="41.6499891%" x2="54.3044576%" y2="71.7731228%" id="linearGradient-1">
																	            <stop stop-color="#686868" stop-opacity="0.395833333" offset="0%"></stop>
																	            <stop stop-color="#545454" stop-opacity="0.658203125" offset="100%"></stop>
																	        </linearGradient>
																	        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-2">
																	            <stop stop-color="#FFFFFF" stop-opacity="0" offset="0%"></stop>
																	            <stop stop-color="#FFFFFF" stop-opacity="0.255151721" offset="100%"></stop>
																	        </linearGradient>
																	    </defs>
																	    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
																	        <g id="card_styles" sketch:type="MSLayerGroup">
																	            <g id="Page-1" sketch:type="MSShapeGroup">
																	                <g id="Desktop-HD">
																	                    <g id="card_styles">
																	                        <path d="M0.953125,378.058594 L0.953125,246.631883 L316.628906,341.71875 L0.953125,378.058594 L0.953125,378.058594 Z" id="Path-2" opacity="0.75886194" fill="url(#linearGradient-1)"></path>
																	                        <path d="M0.500197037,377.763682 L380.500197,377.763682 L380.500197,296 L0.500197037,377.763682 L0.500197037,377.763682 Z" id="Path-1" fill="#FFFFFF"></path>
																	                        <path d="M380.500197,275.894531 L380.500197,0.0606841001 L1.13333794,0.0606841001 L0.500197037,155.734375 L380.500197,275.894531 Z" id="Path-3" opacity="0.45598181" fill="url(#linearGradient-2)"></path>
																	                    </g>
																	                </g>
																	            </g>
																	        </g>
																	    </g>
																	</svg></div>
																	
																						</div>
																						
																						
																							
																							<?php if ( has_post_thumbnail() ) { 
																								
																			
																							?>
																							<svg class="heroImageContainerSVG highlightContentBlur" aria-label="Featured Image">

									<!-- Definition of a mask begins -->
							        <defs>
							            <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">
										    <linearGradient id="g" gradientUnits="objectBoundingBox" x2="0" y2="1">
										        <stop stop-color="white" stop-opacity="1" offset="0"/>
										        <stop stop-color="white" stop-opacity="1" offset="0.6"/>
										        <stop stop-color="white" stop-opacity="0.7" offset="0.9"/>
										        <stop stop-color="white" stop-opacity="0" offset="1"/>
										    </linearGradient>
										    <rect width="100%" height="100%" fill="url(#g)"/>
										</mask>
							        </defs>
								
									<foreignObject width="100%" height="100%" style="mask: url(#mask); ">
								
								<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php the_post_thumbnail_url('medium') ?>); background-size: cover; background-position: center center; "></div></div>

								
								</foreignObject>
								</svg>
																								  <?php the_post_thumbnail('medium'); ?>
																							<?php } 
																								else{ ?>
																								
														<svg class="heroImageContainerSVG highlightContentBlur" aria-label="Featured Image">

									<!-- Definition of a mask begins -->
							        <defs>
							            <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">
										    <linearGradient id="g" gradientUnits="objectBoundingBox" x2="0" y2="1">
										        <stop stop-color="white" stop-opacity="1" offset="0"/>
										        <stop stop-color="white" stop-opacity="1" offset="0.6"/>
										        <stop stop-color="white" stop-opacity="0.7" offset="0.9"/>
										        <stop stop-color="white" stop-opacity="0" offset="1"/>
										    </linearGradient>
										    <rect width="100%" height="100%" fill="url(#g)"/>
										</mask>
							        </defs>
								
									<foreignObject width="100%" height="100%" style="mask: url(#mask); ">
								
								<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg); background-size: cover; background-position: center center; "></div></div>

								
								</foreignObject>
								</svg>
																									<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
																								<?php }
																							?>
																							
																							
																							
																							
																						</div>
																			
																						
																					</div>
																					<div class="textContent">
																					<div>
																						<div class="middleImageSample">
																							<div class="whiteContent">
																								<div class="dateposted"><?php the_time('M') ?> <?php the_time('jS') ?></div>
																								<div class="numericdate"><?php the_time('Ymd'); ?></div>
																								<h2><?php the_title(); ?></h2>
																								<div><?php the_excerpt(); ?></div>
																								
																																									
																								
																							</div>
																							
																						</div>
																					</div>
																				</div>
																				</div>
																				
																			</div>
																		<?php }
																		
																		
																		wp_reset_postdata();
																	}
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	//echo "Highlighted Page";
																	
																	
																	$highlightpage = get_sub_field('fw_page_to_highlight');
																	
																	
																	
																	
																	// The Query
																	$query1 = new WP_Query( array( 'page_id' => $highlightpage ) );
																	
																	if ( $query1->have_posts() ) {
																		// The Loop
																		while ( $query1->have_posts() ) { $query1->the_post(); ?>
																			
																			
																			
																			
																			<div class="grid-item2col">
																				
																			
																				
																			<div class="tiltWrapper custom custom2col" data-maxangle="3" data-tiltdepth="70">
		  
																				<a href="<?php the_permalink(); ?>" class="tiltAction"><?php the_title(); ?></a>
																				
																				<div class="tiltPanel">
																					
																					
																							
																					
																					
																					<div class="plane level1">
																						<div class="reflection">
																							<svg width="130px" height="130px" viewBox="0 0 130 130" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
																							    <!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
																							    <title>glare</title>
																							    <desc>Created with Sketch.</desc>
																							    <defs>
																							        <radialGradient cx="50%" cy="50%" fx="50%" fy="50%" r="50%" id="radialGradient-1">
																							            <stop stop-color="#FFFFFF" stop-opacity="0.458786232" offset="0%"></stop>
																							            <stop stop-color="#FFFFFF" stop-opacity="0" offset="100%"></stop>
																							        </radialGradient>
																							    </defs>
																							    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
																							        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -322.000000)" fill="url(#radialGradient-1)">
																							            <circle id="glare" sketch:type="MSShapeGroup" cx="491" cy="387" r="65"></circle>
																							        </g>
																							    </g>
																							</svg>
																						</div>
																					
																											
																						
																	
																						<div class="backgroundImageSample">
																							<div class="cardStyles"><svg width="381px" height="379px" viewBox="0 0 381 379" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
																	    <!-- Generator: Sketch 3.4.2 (15855) - http://www.bohemiancoding.com/sketch -->
																	    <title>card_styles</title>
																	    <desc>Created with Sketch.</desc>
																	    <defs>
																	        <linearGradient x1="42.1905898%" y1="41.6499891%" x2="54.3044576%" y2="71.7731228%" id="linearGradient-1">
																	            <stop stop-color="#686868" stop-opacity="0.395833333" offset="0%"></stop>
																	            <stop stop-color="#545454" stop-opacity="0.658203125" offset="100%"></stop>
																	        </linearGradient>
																	        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-2">
																	            <stop stop-color="#FFFFFF" stop-opacity="0" offset="0%"></stop>
																	            <stop stop-color="#FFFFFF" stop-opacity="0.255151721" offset="100%"></stop>
																	        </linearGradient>
																	    </defs>
																	    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
																	        <g id="card_styles" sketch:type="MSLayerGroup">
																	            <g id="Page-1" sketch:type="MSShapeGroup">
																	                <g id="Desktop-HD">
																	                    <g id="card_styles">
																	                        <path d="M0.953125,378.058594 L0.953125,246.631883 L316.628906,341.71875 L0.953125,378.058594 L0.953125,378.058594 Z" id="Path-2" opacity="0.75886194" fill="url(#linearGradient-1)"></path>
																	                        <path d="M0.500197037,377.763682 L380.500197,377.763682 L380.500197,296 L0.500197037,377.763682 L0.500197037,377.763682 Z" id="Path-1" fill="#FFFFFF"></path>
																	                        <path d="M380.500197,275.894531 L380.500197,0.0606841001 L1.13333794,0.0606841001 L0.500197037,155.734375 L380.500197,275.894531 Z" id="Path-3" opacity="0.45598181" fill="url(#linearGradient-2)"></path>
																	                    </g>
																	                </g>
																	            </g>
																	        </g>
																	    </g>
																	</svg></div>
																	
																						</div>
																						
																						
																							
																							<?php if ( has_post_thumbnail() ) { 
																								
																			
																							?>
																							<svg class="heroImageContainerSVG highlightContentBlur" aria-label="Featured Image">

									<!-- Definition of a mask begins -->
							        <defs>
							            <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">
										    <linearGradient id="g" gradientUnits="objectBoundingBox" x2="0" y2="1">
										        <stop stop-color="white" stop-opacity="1" offset="0"/>
										        <stop stop-color="white" stop-opacity="1" offset="0.6"/>
										        <stop stop-color="white" stop-opacity="0.7" offset="0.9"/>
										        <stop stop-color="white" stop-opacity="0" offset="1"/>
										    </linearGradient>
										    <rect width="100%" height="100%" fill="url(#g)"/>
										</mask>
							        </defs>
								
									<foreignObject width="100%" height="100%" style="mask: url(#mask); ">
								
								<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php the_post_thumbnail_url('medium') ?>); background-size: cover; background-position: center center; "></div></div>

								
								</foreignObject>
								</svg>
																								  <?php the_post_thumbnail('medium'); ?>
																							<?php } 
																								else{ ?>
																								
														<svg class="heroImageContainerSVG highlightContentBlur" aria-label="Featured Image">

									<!-- Definition of a mask begins -->
							        <defs>
							            <mask id="mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse">
										    <linearGradient id="g" gradientUnits="objectBoundingBox" x2="0" y2="1">
										        <stop stop-color="white" stop-opacity="1" offset="0"/>
										        <stop stop-color="white" stop-opacity="1" offset="0.6"/>
										        <stop stop-color="white" stop-opacity="0.7" offset="0.9"/>
										        <stop stop-color="white" stop-opacity="0" offset="1"/>
										    </linearGradient>
										    <rect width="100%" height="100%" fill="url(#g)"/>
										</mask>
							        </defs>
								
									<foreignObject width="100%" height="100%" style="mask: url(#mask); ">
								
								<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg); background-size: cover; background-position: center center; "></div></div>

								
								</foreignObject>
								</svg>
																									<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
																								<?php }
																							?>
																							
																							
																							
																							
																						</div>
																			
																						
																					</div>
																					<div class="textContent">
																					<div>
																						<div class="middleImageSample">
																							<div class="whiteContent">
																								<div class="dateposted"><?php the_time('M') ?> <?php the_time('jS') ?></div>
																								<div class="numericdate"><?php the_time('Ymd'); ?></div>
																								<h2><?php the_title(); ?></h2>
																								<div><?php the_excerpt(); ?></div>
																								
																																									
																								
																							</div>
																							
																						</div>
																					</div>
																				</div>
																				</div>
																				
																			</div>
																		<?php }
																		
																		
																		wp_reset_postdata();
																	}
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														<?php }
														 
													 }
												endwhile;
												
											}
								        	
											/********  2 Columns   ********/
								        } else if( get_row_layout() == '2_column (50/50)' ) { ?>
											
											<div class="flex-row flex-<?php the_sub_field('column_sizes'); ?> left_<?php the_sub_field('left_column_style'); ?> right_<?php the_sub_field('right_column_style'); ?>">
												
											<?php if( have_rows('2c_5050_left_column') ) { ?>
													<div class="flex-item flex-leftCol">
												<?php while ( have_rows('2c_5050_left_column') ) : the_row();
													
													
													 if( get_row_layout() == 'body_text' ) { ?>
														
														 <?php the_sub_field("text_content"); ?>
														 
													 <?php } else if( get_row_layout() == 'title_text' ) { ?>
														<header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1>
														</header>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														  
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum,'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														  <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
															?>
				
													 <?php }

												endwhile; ?>
													</div>
											<?php }
											
											if( have_rows('2c_5050_right_column') ) { ?>
													<div class="flex-item flex-rightCol">
														<div class="sidebarFold">
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
												<?php while ( have_rows('2c_5050_right_column') ) : the_row();
													
													
													 if( get_row_layout() == 'body_text' ) {
														
														 the_sub_field("text_content");
														 
													 } else if( get_row_layout() == 'title_text' ) { ?>
														
														 <header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1> </header>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														
														 
														 
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum, 'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														
														 
														 <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
														 ?>

														 
													 <?php }
												endwhile; ?>
													</div>
											<?php } ?>
											
											
								        	
											</div>
								        	<?php 
											
											 /********  3 Columns   ********/
								        } else if( get_row_layout() == '3_column' ) { ?>
											
											<div class="flex-row flex-<?php the_sub_field('column_sizes'); ?> left_<?php the_sub_field('left_column_style'); ?> right_<?php the_sub_field('right_column_style'); ?>">
												
											<?php if( have_rows('3c_5050_left_column') ) { ?>
													<div class="flex-item flex-leftCol">
												<?php while ( have_rows('3c_5050_left_column') ) : the_row();
													
													
													 if( get_row_layout() == 'body_text' ) { ?>
														
														 <?php the_sub_field("text_content"); ?>
														 
													 <?php } else if( get_row_layout() == 'title_text' ) { ?>
														<header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1>
														</header>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														  
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum,'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														  <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
															?>
				
													 <?php }

												endwhile; ?>
													</div>
											<?php }
												
												
											if( have_rows('3c_5050_middle_column') ) { ?>
													<div class="flex-item flex-rightCol">
														<div class="sidebarFold">
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
												<?php while ( have_rows('3c_5050_middle_column') ) : the_row();
													
													
													 if( get_row_layout() == 'body_text' ) {
														
														 the_sub_field("text_content");
														 
													 } else if( get_row_layout() == 'title_text' ) { ?>
														
														 <header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1> </header>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														
														 
														 
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum, 'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														
														 
														 <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
														 ?>

														 
													 <?php }
												endwhile; ?>
													</div>
											<?php } 
											
											if( have_rows('3c_5050_right_column') ) { ?>
													<div class="flex-item flex-rightCol">
														<div class="sidebarFold">
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
												<?php while ( have_rows('3c_5050_right_column') ) : the_row();
													
													
													 if( get_row_layout() == 'body_text' ) {
														
														 the_sub_field("text_content");
														 
													 } else if( get_row_layout() == 'title_text' ) { ?>
														
														 <header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1> </header>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														
														 
														 
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum, 'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														
														 
														 <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
														 ?>

														 
													 <?php }
												endwhile; ?>
													</div>
											<?php } ?>
											
											
								        	
											</div>
								        	<?php 
											
											} 
								
								    endwhile;
								
								} else { // no layouts found ?>
									<h1>You should add some content.</h1>
							   <?php } //close off check for advanced editor ?>
							<?php } else { ?>
							
						
						
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
									            <stop stop-color="#FFFFFF" stop-opacity="0.7" offset="0%"></stop>
									            <stop stop-color="#FFFFFF" offset="100%"></stop>
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
						<?php 
							
							$breadcrumb_settings = get_theme_mod( 'uw-madison-wp-2015_breadcrumbs_id' );
							
							
							if($breadcrumb_settings == "shown") {
								
								 get_template_part('breadcrumb', 'menu'); 
							}
						?>
					
						
				
					<?php get_template_part( 'content', 'page' ); ?>
					
					
					<?php } ?>
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
				?>
				
				
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .site-content-inner -->
<?php get_footer(); ?>
