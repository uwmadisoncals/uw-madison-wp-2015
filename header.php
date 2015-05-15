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
<div class="searchUI" aria-hidden="true"><?php get_search_form(); ?><a href="#" class="searchClose"><svg enable-background="new 0 0 32 32" height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><polyline fill="none" points="   649,137.999 675,137.999 675,155.999 661,155.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   653,155.999 649,155.999 649,141.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   661,156 653,162 653,156  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/></g><g><path d="M11.312,12.766c0.194,0.195,0.449,0.292,0.704,0.292c0.255,0,0.51-0.097,0.704-0.292c0.389-0.389,0.389-1.02,0-1.409   L4.755,3.384c-0.389-0.389-1.019-0.389-1.408,0s-0.389,1.02,0,1.409L11.312,12.766z"/><path d="M17.407,16.048L28.652,4.793c0.389-0.389,0.389-1.02,0-1.409c-0.389-0.389-1.019-0.561-1.408-0.171L15.296,15   c0,0-0.296,0-0.296,0s0,0.345,0,0.345L3.2,27.303c-0.389,0.389-0.315,1.02,0.073,1.409c0.194,0.195,0.486,0.292,0.741,0.292   s0.528-0.097,0.722-0.292L15.99,17.458l11.249,11.255c0.194,0.195,0.452,0.292,0.706,0.292s0.511-0.097,0.705-0.292   c0.389-0.389,0.39-1.02,0.001-1.409L17.407,16.048z"/></g></svg></a></div>
<div class="searchResultsOverlay" aria-hidden="true"></div>

<div class="mobileMenu"><h2 class="mobileTitle">Menu</h2><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?><div class="subLevel1"></div><div class="subLevel2"></div></div>
<div class="menuOverlay"></div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'uw-madison-wp-2015' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
			<div class="logo-search-container">
				<div class="site-branding">
					<a href="#" class="mobileTrigger"><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg></a>
					
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
				
				
				<div class="search-youruw">
					
					<div class="youruw">
						<a href="#" class="youruwTrigger">Your UW</a>
						<div class="youruwmenu">
							<?php if ( has_nav_menu( 'youruw' ) ) { ?>
							<?php wp_nav_menu( array( 'theme_location' => 'youruw' ) ); ?>
							<?php } else { ?>
									<ul>
										<li><a href="http://wisc.edu">UW-Madison</a></li>
										<li><a href="http://my.wisc.edu">My UW</a></li>
										<li><a href="http://map.wisc.edu">Campus Map</a></li>
									</ul>
							<?php } ?>
						</div>
					</div>
					
					<div class="search"><a href="#" class="searchTrigger">
						<svg width="19px" height="19px" viewBox="0 0 19 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <!-- Generator: Sketch 3.3 (11970) - http://www.bohemiancoding.com/sketch -->
    <title>search-icon</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Desktop-HD-Alt" sketch:type="MSArtboardGroup" transform="translate(-1242.000000, -34.000000)" fill="#FFFFFF">
            <g id="satellite-nav" sketch:type="MSLayerGroup" transform="translate(1141.000000, 26.000000)">
                <g id="1427843142_common_search_lookup_" transform="translate(101.000000, 8.000000)" sketch:type="MSShapeGroup">
                    <g id="miu">
                        <g id="common_search_lookup_glyph">
                            <path d="M13.3667388,11.5346894 C14.1956945,10.3458308 14.6818182,8.90014012 14.6818182,7.34090909 C14.6818182,3.28663675 11.3951814,0 7.34090909,0 C3.28663675,0 0,3.28663675 0,7.34090909 C0,11.3951814 3.28663675,14.6818182 7.34090909,14.6818182 C8.89990029,14.6818182 10.3453862,14.195844 11.5341409,13.3671211 L11.5346339,13.3666833 L16.9786009,18.8106502 C17.0795394,18.9115888 17.2400871,18.9146947 17.3437279,18.8110538 L18.8110538,17.3437279 C18.9117694,17.2430123 18.9070875,17.0750381 18.8106502,16.9786009 L13.3667388,11.5346894 L13.3667388,11.5346894 Z M7.34090909,12.9545455 C10.441235,12.9545455 12.9545455,10.441235 12.9545455,7.34090909 C12.9545455,4.24058318 10.441235,1.72727273 7.34090909,1.72727273 C4.24058318,1.72727273 1.72727273,4.24058318 1.72727273,7.34090909 C1.72727273,10.441235 4.24058318,12.9545455 7.34090909,12.9545455 L7.34090909,12.9545455 Z" id="search-icon"></path>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg></a></div>
					
				</div>
				
				
			</div>
		
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="site-navigation-container">
					
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); ?>
				</div>
			</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->
  
	<div class="featureHeader">
				
		<?php if(is_home()) { ?>
				<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					
					if($loop->have_posts()) { ?>
					<?php $loopcount = $loop->post_count; 
						if($loopcount > 1) {
					?>
						<div class="owl-carousel">
						
					<?php } else { ?>
						<div class="heroSingle">
					<?php } ?>
					
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div>
						<?php 

							$image = get_field('hero_image');
							$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
							
							if( $image ) {
								 $attachment_id = get_field('hero_image'); $size = "hero-image"; 
								 $image = wp_get_attachment_image_src($attachment_id, $size);
								
								//$imgurl = wp_get_attachment_image_src( $image, $size ); ?>
								<svg class="heroImageContainerSVG">

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
								
								<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: center center;"></div></div>
								</foreignObject>
								</svg>
								
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
								<svg class="heroImageContainerSVG">

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
									<div class="heroImageBlur"><div class="heroImageBlurInner heroImageDefault"></div></div>
									</foreignObject>
								</svg>
								
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
								<svg class="heroImageContainerSVG">

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
									<div class="heroImageBlur"><div class="heroImageBlurInner heroImageDefault"></div></div>
									</foreignObject>
								</svg>
								 
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
