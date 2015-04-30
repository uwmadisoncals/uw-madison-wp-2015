<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UW Madison WP 2015
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'uw-madison-wp-2015' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
			<div class="logo-search-container">
				<div class="site-branding">
					
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					
					<?php
						// Check to see if the header image has been removed
						$header_image = get_header_image();
						if ( $header_image ) :
							// Compatibility with versions of WordPress prior to 3.4.
							if ( function_exists( 'get_custom_header' ) ) {
								// We need to figure out what the minimum width should be for our featured image.
								// This result would be the suggested width if the theme were to implement flexible widths.
								$header_image_width = get_theme_support( 'custom-header', 'width' );
							} else {
								$header_image_width = HEADER_IMAGE_WIDTH;
							}
							?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage">
				<?php
					
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
						?>
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
				<?php /*endif;*/ // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>
					
				</div><!-- .site-branding -->
			</div>
		
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="site-navigation-container">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'uw-madison-wp-2015' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</div>
			</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->
  
	<div class="featureHeader">
				
		<?php if(is_home()) { ?>
				<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					
					if($loop->have_posts()) { ?>
						
					<div class="owl-carousel">
					
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div>
						<?php 

							$image = get_field('hero_image');
							$size = 'large'; // (thumbnail, medium, large, full or custom size)
							
							if( $image ) {
								 $attachment_id = get_field('hero_image'); $size = "large"; 
								 $image = wp_get_attachment_image_src($attachment_id, $size);
								
								//$imgurl = wp_get_attachment_image_src( $image, $size ); ?>
								<div class="heroImageBlur" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: center center;"></div>
								<div class="heroImage" style="background: url(<?php echo $image[0] ?>); background-size: cover; background-position: center center;">
									<div class="heroOverlay"></div>
									<div class="heroHeadingWrapper">
									
									<?php  
									$linkoption = get_field('link_to'); ?>
									
									<?php if($linkoption == 'pageorpost') { ?>
											<a href="<?php the_field('link_to_a_page_or_post'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
									<?php } else if($linkoption == 'externalurl') { ?>
											<a href="http://<?php the_field('specify_a_url'); ?>" class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></a>
									<?php } else { ?>
											<div class="heroHeading"><h1><span><?php the_field('sub_heading_text') ?></span> <?php the_title(); ?></h1></div>
									<?php } ?>
									</div>
								</div>

							<?php } else { ?>
									<div class="heroImageBlur heroImageDefault"></div>
									<div class="heroImage heroImageDefault">
										<div class="heroOverlay"></div>
										<div class="heroHeadingWrapper">
											<div class="heroHeading"><h1><span>A Wordpress theme for UW Madison</span> Madison 2015 Theme</h1></div>
										</div>
									</div>
							<?php } ?>
						
						
						</div>
					<?php endwhile; ?>
					</div>
					<?php } else { ?>
								<div class="heroImageBlur heroImageDefault"></div>

								<div class="heroImage heroImageDefault">
									<div class="heroOverlay"></div>
									<div class="heroHeadingWrapper">	
										<div class="heroHeading"><h1><span>A Wordpress theme for UW Madison</span> Madison 2015 Theme</h1></div>
									</div>										
								</div>
					<?php } ?>
				
		<?php } ?>
		
		
	</div>
 

	<div id="content" class="site-content">
