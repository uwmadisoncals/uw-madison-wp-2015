<?php $numofposts = get_sub_field('fw_number_of_posts');  
																	
																	// The Query
																	$query1 = new WP_Query( array( 'posts_per_page' => $numofposts ) ); ?>
																	
																	
																	
																	<?php if ( $query1->have_posts() ) {
																		// The Loop ?>
																		
																																				
																		<?php while ( $query1->have_posts() ) { $query1->the_post(); ?> 
																			
																			<?php if(catch_that_thumbnail() || has_post_thumbnail()) { $thumbnail = true; $thumbcss = ""; } else { $thumbnail = false; $thumbcss = "noThumb"; } ?>
																			<div class="grid-item3col">
																			
																				

																			
																				
																			<div class="tiltWrapper custom custom2col <?php echo $thumbcss ?>" data-maxangle="3" data-tiltdepth="70">
		  
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
																						
																						
																							<div class="heroGradient"></div>
																							<?php if ( has_post_thumbnail() ) { 
																								
																			
																							?>
																							<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php the_post_thumbnail_url('medium') ?>); background-size: cover; background-position: center center; "></div></div>


																								  


																										<?php if($columnstyle == "fixedheight") { ?>
																											<div class="heroImageFixedHeight" data-imgurl="<?php the_post_thumbnail_url('medium') ?>" style="background-image: url(<?php the_post_thumbnail_url('medium') ?>); background-size: cover; background-position: center center; "></div>
																										<?php } else { ?>
																										<?php the_post_thumbnail('medium'); ?>
																										<?php } ?>

                                                                                                  <?php } else if(catch_that_thumbnail()) { ?>

                                                                                                  <div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo catch_that_thumbnail(); ?>); background-size: cover; background-position: center center; "></div></div>
                                                                                                  <?php if($columnstyle == "fixedheight") { ?>
																									<div class="heroImageFixedHeight" data-imgurl="<?php echo catch_that_thumbnail(); ?>" style="background-image: url(<?php echo catch_that_thumbnail(); ?>); background-size: cover; background-position: center center; "></div>
																								<?php } else { ?>
																								  <img alt=" " src="<?php echo catch_that_thumbnail(); ?>">
																								  <?php } ?>
																								  
																							<?php } 
																								else{ ?>
																									<div class="thumbCheck noThumb"></div>
														
																								<?php }
																							?>
																							
																							
																							
																							
																						</div>
																			
																					<?php if( $thumbnail == false ) { ?> 
																						
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
																			  <?php } else { ?>
																			  			</div>
																					<div class="textContent">
																					<div>
																						<div class="middleImageSample">
																							<div class="whiteContent">
																								<div class="dateposted"><?php the_time('M') ?> <?php the_time('jS') ?></div>
																								<div class="numericdate"><?php the_time('Ymd'); ?></div>
																								<h2><?php the_title(); ?></h2>
																								
																								
																																									
																								
																							</div>
																							
																						</div>
																					</div>
																				</div>
																			  <?php } ?>
																				</div>
																				
																			</div>
																		<?php }
																		
																		
																		wp_reset_postdata();
																	}