<?php //Latest Post Slide


																	$heroterms = get_field('hero_post_categories'); 
																	$herocategories = 0;

																	$offset = 0;
                                                                    $offsettest = get_field('hero_post_offset');

                                                                    if($offsettest) {
                                                                        $offset = $offsettest;
                                                                    }
																	
																	if( $heroterms ): ?>
																	
																		<?php 
																			
																			foreach( $heroterms as $heroterm ) {
																			
																			$herocategories = $herocategories.",".$heroterm;	
																			//echo $term;
																		} ?>
																		
																	<?php endif; 
																	
																	
																	//$numofposts = get_sub_field('fw_cat_number_of_posts');
																	
																	// The Query
																	$query2 = new WP_Query( array( 'posts_per_page' => 1, 'offset' => $offset, 'cat' => $herocategories ) );
								//$query2 = new WP_Query( $args2 );

								if ( $query2->have_posts() ) {
									// The 2nd Loop
									while ( $query2->have_posts() ) {
										$query2->the_post(); ?>

											<?php

										$hidebluroption = get_field('disable_blur_filter');

										if($hidebluroption) {


											if( in_array('yes', $hidebluroption) ) { ?>

									<?php 	} else { ?>
											
											<!--div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; "></div></div>-->
									<?php 	}
										} else { ?>
										
											<!--div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; "></div></div>-->
									<?php } ?>


								

								<?php if($header_style != "opaque") { ?>


									<?php

										$hidebluroption = get_field('disable_blur_filter');

										if($hidebluroption) {

											if( in_array('yes', $hidebluroption) ) { ?>

									<?php 	} else { ?>
											<!--div class="heroImageBlur secondaryBlur"><div class="heroImageBlurInnerAlt" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php  if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;"></div></div-->
									<?php 	}
										} else { ?>
											<!--div class="heroImageBlur secondaryBlur"><div class="heroImageBlurInnerAlt" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php  if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;"></div></div-->
									<?php } ?>



								<?php } ?>

								<?php if(is_front_page()) { ?>
									
									
									<?php if($home_photo_header_size) { ?>
											<div class="heroImage" style="background: url(<?php the_post_thumbnail_url('large') ?>); background-size: cover; background-position: <?php  if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; min-height:<?php echo $home_photo_header_size ?>px;">
									<?php } else { ?>
											<div class="heroImage" style="background: url(<?php the_post_thumbnail_url('large') ?>); background-size: cover; background-position: <?php  if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
									<?php } ?>



								<?php } else { ?>
										<?php if($photo_header_size) { ?>
											<div class="heroImage" style="background: url(<?php the_post_thumbnail_url('large') ?>); background-size: cover; background-position: <?php if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; min-height:<?php echo $photo_header_size ?>px;">
										<?php } else { ?>
											<div class="heroImage" style="background: url(<?php the_post_thumbnail_url('large') ?>); background-size: cover; background-position: <?php if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
										<?php } ?>
								<?php } ?>

									<?php

										$hideoverlayoption = get_field('hero_image_filter');

										if($hideoverlayoption) {

											if( in_array('yes', $hideoverlayoption) ) { ?>
												<div class="heroOverlay"></div>
									<?php 	} else { ?>
									
											<div class="heroOverlay"></div>
									<?php 	}
										} else { ?>
										
											<div class="heroOverlay"></div>
									<?php } ?>
									<div class="headerFilter"></div>
									<div class="heroHeadingWrapper">

									<a href="<?php the_permalink(); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>

									
									</div>
								</div>
								</div>
										
									<?php }

									// Restore original Post Data
									wp_reset_postdata();
								}