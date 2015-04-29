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

	<div class="featureHeader">
				
		<?php if(is_home()) { ?>
				<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					
					if($loop->have_posts()) {
					
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
						<?php 

							$image = get_field('hero_image');
							$size = 'large'; // (thumbnail, medium, large, full or custom size)
							
							if( $image ) {
								 $attachment_id = get_field('hero_image'); $size = "large"; 
								 $image = wp_get_attachment_image_src($attachment_id, $size);
								
								//$imgurl = wp_get_attachment_image_src( $image, $size ); ?>
								<div class="heroImage" style="background: url(<?php echo $image[0] ?>);">
									<div class="heroHeadingWrapper">
									
									<?php  
									$linkoption = get_field('link_to'); ?>
									
									<?php if($linkoption == 'pageorpost') { ?>
											<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_title(); ?></span> <?php the_field('sub_heading_text') ?></h1></a>
									<?php } else if($linkoption == 'externalurl') { ?>
											<a href="http://<?php the_field('specify_a_url'); ?>" class="heroHeading"><h1><span><?php the_title(); ?></span> <?php the_field('sub_heading_text') ?></h1></a>
									<?php } else { ?>
											<div class="heroHeading"><h1><span><?php the_title(); ?></span> <?php the_field('sub_heading_text') ?></h1></div>
									<?php } ?>
									</div>
								</div>

							<?php } else { ?>
									<div class="heroImage heroImageDefault">
										<div class="heroHeadingWrapper">
											<div class="heroHeading"><h1><span>A Wordpress them for UW Madison</span> Madison 2015 Theme</h1></div>
										</div>
									</div>
							<?php } ?>
						
						
					
					<?php endwhile; ?>
					<?php } else { ?>
								<div class="heroImage heroImageDefault">
									<div class="heroHeadingWrapper">	
										<div class="heroHeading"><h1><span>A Wordpress them for UW Madison</span> Madison 2015 Theme</h1></div>
									</div>										
								</div>
					<?php } ?>
				
		<?php } ?>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
