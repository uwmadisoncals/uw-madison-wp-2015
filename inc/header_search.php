<?php
						
				

							$image = get_field('hero_image');
							$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)

                            ?>

                            <div class="heroSearch">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label class="searchLabel">
	<div class="searchFormIcon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="-296 387 19 19" enable-background="new -296 387 19 19" xml:space="preserve">
<g>
	<circle fill="#AAAAAA" cx="-286.6" cy="396.4" r="8.9"/>
</g>
<g>
	<circle fill="#117DBA" cx="-286.5" cy="396.5" r="9.5"/>
</g>
<g id="glass" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
	<g id="Page-1" sketch:type="MSPage">
		<g id="Desktop-HD-Alt" transform="translate(-1242.000000, -34.000000)" sketch:type="MSArtboardGroup">
			<g id="satellite-nav" transform="translate(1141.000000, 26.000000)" sketch:type="MSLayerGroup">
				
					<g id="_x31_427843142_x5F_common_x5F_search_x5F_lookup_x5F_" transform="translate(101.000000, 8.000000)" sketch:type="MSShapeGroup">
					<g id="miu">
						<g id="common_search_lookup_glyph">
							<path fill="#FFFFFF" d="M-282,399.9l-2.6-2.6c0.4-0.6,0.6-1.3,0.6-2c0-1.9-1.6-3.5-3.5-3.5s-3.5,1.6-3.5,3.5s1.6,3.5,3.5,3.5
								c0.7,0,1.4-0.2,2-0.6l0,0l2.6,2.6c0,0,0.1,0,0.2,0l0.7-0.7C-282,400-282,400-282,399.9z M-287.5,398c-1.5,0-2.7-1.2-2.7-2.7
								s1.2-2.7,2.7-2.7s2.7,1.2,2.7,2.7S-286,398-287.5,398z"/>
						</g>
					</g>
				</g>
			</g>
		</g>
	</g>
</g>
</svg>

<div class="radiate"></div>
</div>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'uw_madison_wp_2015' ) ?></span>
		<input type="text" class="search-field" placeholder="<?php the_title(); ?>" value="<?php echo get_search_query() ?>" id="s" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<div class="tabSuggest">Press <strong>tab</strong> to complete the suggestion.</div>
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form></div>

                            <?php

							if( $image ) {

								 $attachment_id = get_field('hero_image'); $size = "hero-image";
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





								<div class="heroImage heroVideo" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
									<video autoplay loop id="bgvid">
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
											<div class="heroImage" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; min-height:<?php echo $home_photo_header_size ?>px;">
									<?php } else { ?>
											<div class="heroImage" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
									<?php } ?>



								<?php } else { ?>
										<?php if($photo_header_size) { ?>
											<div class="heroImage" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; min-height:<?php echo $photo_header_size ?>px;">
										<?php } else { ?>
											<div class="heroImage" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;">
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