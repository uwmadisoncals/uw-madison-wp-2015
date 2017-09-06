<?php
							//Remote Header Slides

                            $url = get_field('remote_url'); 

                            $offset = get_field('remote_content_offset'); 
                            $category = get_field('remote_category_id'); 


                            if($category == "") {
                                    $requesturi = $url."/wp-json/wp/v2/posts?per_page=1";
                                } else {
                                    $requesturi = $url."/wp-json/wp/v2/posts?per_page=1&categories=".$category;
                                } ?>

								<?php if($offset != "") {
                                    $requesturi = $requesturi."&offset=".$offset;
                                }
																	
							



							$image = get_field('remote_image_fallback');
							$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)

							if( $image ) {

								 $attachment_id = get_field('remote_image_fallback'); $size = "hero-image";
								 $image = wp_get_attachment_image_src($attachment_id, $size);

								$hidebluroption = get_field('disable_blur_filter');
								if($hidebluroption) {
										if( in_array('yes', $hidebluroption) ) {	?>
												<aside class="hide_blur">
							<?php } else {
										}
								}

								$hideoverlayoption = get_field('hero_image_filter');
								if($hideoverlayoption) {
										if( in_array('yes', $hideoverlayoption) ) {	?>
												<aside class="no_filter">
							<?php } else {
										}
								}


								//$imgurl = wp_get_attachment_image_src( $image, $size ); ?>

								<div class="heroImageIeMask"></div>



								<!-- Content Type Selection -->
							

								<?php
									$video = get_field('hero_video');

									if( $video ) { ?>
									<!-- If a Hero Video is set -->

									<?php

										$hidebluroption = get_field('disable_blur_filter');

										if($hidebluroption) {

											if( in_array('yes', $hidebluroption) ) { ?>
												
									<?php 	} else { ?>
											
											<!--div class="heroImageBlur heroVideoBlur"><div class="heroImageBlurInner"></div></div-->
									<?php 	}
										} else { ?>
											<!--div class="heroImageBlur heroVideoBlur"><div class="heroImageBlurInner"></div></div-->
									<?php } ?>





								<div class="heroImage heroVideo remoteHero" data-remoteurl="<?php echo $requesturi ?>" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
									<video autoplay loop class="bgvid">
										    <source src="<?php echo $video ?>" type="video/mp4">
									</video>

									<?php

										$hideoverlayoption = get_field('hero_image_filter');

										if($hideoverlayoption) {

											if( in_array('yes', $hideoverlayoption) ) { ?>

									<?php 	} else { ?>
											<div class="heroOverlay"></div>
									<?php 	}
										} else { ?>
											<div class="heroOverlay"></div>
									<?php } ?>
									<div class="heroHeadingWrapper">

									<?php
									$hidetextoption = get_field('hide_slide_text');

									$linkoption = get_field('link_to'); ?>

									<?php if($hidetextoption) {  ?>

										<?php if( in_array('hide', $hidetextoption) ) { ?>

										<?php } else { ?>

												<?php if($linkoption == 'pageorpost') { ?>
												<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else if($linkoption == 'externalurl') { ?>
												<a href="http://<?php the_field('specify_a_url'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else { ?>
												<div class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></div>
										<?php } ?>
										<?php } ?>

									<?php } else { ?>

										<?php if($linkoption == 'pageorpost') { ?>
												<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else if($linkoption == 'externalurl') { ?>
												<a href="http://<?php the_field('specify_a_url'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else { ?>
												<div class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></div>
										<?php } ?>

									<?php } ?>
									</div>
								</div>

									<?php } else { ?>
									<!-- If a Hero Video is NOT set -->


									<?php

										$hidebluroption = get_field('disable_blur_filter');

										if($hidebluroption) {


											if( in_array('yes', $hidebluroption) ) { ?>

									<?php 	} else { ?>
											
											<!--div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; "></div></div>-->
									<?php 	}
										} else { ?>
										
											<!--div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; "></div></div>-->
									<?php } ?>


								

								<?php if($header_style != "opaque") { ?>


									<?php

										$hidebluroption = get_field('disable_blur_filter');

										if($hidebluroption) {

											if( in_array('yes', $hidebluroption) ) { ?>

									<?php 	} else { ?>
											<!--div class="heroImageBlur secondaryBlur"><div class="heroImageBlurInnerAlt" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;"></div></div-->
									<?php 	}
										} else { ?>
											<!--div class="heroImageBlur secondaryBlur"><div class="heroImageBlurInnerAlt" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;"></div></div-->
									<?php } ?>



								<?php } ?>

                                

								<?php if(is_front_page()) { ?>
                                       
									<?php if($home_photo_header_size) { ?>
                                     
											<div class="heroImage remoteHero" data-headersize="<?php echo $home_photo_header_size ?>" data-remoteurl="<?php echo $requesturi ?>" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; min-height:<?php echo $home_photo_header_size ?>px;">
									<?php } else { ?>
											<div class="heroImage remoteHero" data-headersize="400" data-remoteurl="<?php echo $requesturi ?>" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
									<?php } ?>



								<?php } else { ?>
										<?php if($photo_header_size) { ?>
											<div class="heroImage remoteHero" data-headersize="<?php echo $photo_header_size ?>" data-remoteurl="<?php echo $requesturi ?>" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; min-height:<?php echo $photo_header_size ?>px;">
										<?php } else { ?>
											<div class="heroImage remoteHero" data-headersize="150" data-remoteurl="<?php echo $requesturi ?>" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
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

									<?php

									$hidetextoption = get_field('hide_slide_text');

									$linkoption = get_field('link_to'); ?>

									<?php if($hidetextoption) {  ?>

										<?php if( in_array('hide', $hidetextoption) ) { ?>

										<?php } else { ?>

												<?php if($linkoption == 'pageorpost') { ?>
												<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else if($linkoption == 'externalurl') { ?>
												<a href="http://<?php the_field('specify_a_url'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else { ?>
												<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } ?>
										<?php } ?>

									<?php } else { ?>

										<?php if($linkoption == 'pageorpost') { ?>
												<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else if($linkoption == 'externalurl') { ?>
												<a href="http://<?php the_field('specify_a_url'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } else { ?>
												<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
										<?php } ?>

									<?php } ?>
									</div>
								</div>

								<?php } ?>

							<?php } else { ?>
							

									<div class="heroImage heroImageDefault">
										<div class="heroOverlay"></div>
										<div class="heroHeadingWrapper">
											<div class="heroHeading"><h1><span>A Wordpress theme for UW Madison</span> Madison 2015 Theme</h1></div>
										</div>
									</div>
							<?php } ?>


						</div>