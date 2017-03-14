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
<script type="text/javascript">
var templateUrl = '<?php home_url(); ?>';
</script>


<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/safari-pinned-tab.svg" color="#C5050C">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/mstile-144x144.png">
<meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri(); ?>/browserconfig.xml">
<meta name="theme-color" content="#ffffff">



<?php wp_head(); ?>

<?php include("header_include.php"); ?>
</head>

<body <?php body_class(); ?> style="background-color: #<?php background_color(); ?>">
	
	<div class="loadCover">
		<div class="loadLogo"></div>
	</div>

<div class="searchUI" aria-hidden="true"><?php get_search_form(); ?><a href="#" class="searchClose"><svg enable-background="new 0 0 32 32" aria-label="Close Search" height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><polyline fill="none" points="   649,137.999 675,137.999 675,155.999 661,155.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   653,155.999 649,155.999 649,141.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   661,156 653,162 653,156  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/></g><g><path d="M11.312,12.766c0.194,0.195,0.449,0.292,0.704,0.292c0.255,0,0.51-0.097,0.704-0.292c0.389-0.389,0.389-1.02,0-1.409   L4.755,3.384c-0.389-0.389-1.019-0.389-1.408,0s-0.389,1.02,0,1.409L11.312,12.766z"/><path d="M17.407,16.048L28.652,4.793c0.389-0.389,0.389-1.02,0-1.409c-0.389-0.389-1.019-0.561-1.408-0.171L15.296,15   c0,0-0.296,0-0.296,0s0,0.345,0,0.345L3.2,27.303c-0.389,0.389-0.315,1.02,0.073,1.409c0.194,0.195,0.486,0.292,0.741,0.292   s0.528-0.097,0.722-0.292L15.99,17.458l11.249,11.255c0.194,0.195,0.452,0.292,0.706,0.292s0.511-0.097,0.705-0.292   c0.389-0.389,0.39-1.02,0.001-1.409L17.407,16.048z"/></g></svg></a><div id="ajaxResults"></div></div>
<div class="searchResultsOverlay" aria-hidden="true"></div>

<div class="mobileMenu">
	<h2 class="mobileTitle">Menu</h2>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	<div class="subLevel1"></div>
	<div class="subLevel2"></div>
	
	<?php
	//find all of the parents to the post
	$current_page_ancestors = get_post_ancestors($post);
	
	$tmp_post = $post;

	//get children of current page
	$child_pages = get_pages('child_of='.$post->ID.'&parent='.$post->ID.'&sort_column=menu_order');
	
	if(!empty($child_pages)){?>		
		<h2 class="mobileTitle"><?php echo get_the_title(); ?></h2>	
		<ul id="full_page_nav" class="flexbox-container">
			<?php
            foreach($child_pages as $post){
            	setup_postdata($post);?>
           			<li class="page_item page-item-<?php the_ID();?>">
           				<a href="<?php the_permalink(); ?>">
           					<div class="heading"><?php the_title(); ?> </div>
						</a
						
                     </li>
            <?php } ?>
        </ul><!-- #nav_explore --> 
	<?php 
	}


	// Done. restore original $post
	$post = $tmp_post;
?>

</div>
<div class="menuOverlay"></div>







<div id="page" class="hfeed site <?php $header_slides_style = get_theme_mod( 'uw-madison-wp-2015_header_slides_options_id' ); if($header_slides_style == "hidden") { echo "hiddenSlides"; } else { echo "visibleSlides"; } ?> <?php $header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' ); if($header_style == "opaque") { echo "solidHeader"; } else if($header_style == "photo") { echo "photoHeader"; } else { echo "transparentHeader"; } ?> <?php $home_layout_settings = get_theme_mod( 'uw-madison-wp-2015_layout_id' ); if($home_layout_settings == "tiles") { echo "tiledPosts"; }; if($home_layout_settings == "right_sidebar") { echo "postsRightSidebar"; } ?> <?php $header_layout_settings = get_theme_mod( 'uw-madison-wp-2015_header_layout_id' ); if($header_layout_settings == "righthand") { echo "rightHandNav"; } else { echo "navBar"; } ?> <?php if( get_field('hide_the_side_navigation')) { echo "hiddenSidebar"; } ?> <?php if( get_field('page_theme') == 'documentation') { echo 'documentationSection'; } ?> <?php $sidebar_settings = get_theme_mod( 'uw-madison-wp-2015_sidebar_style_id' ); if($sidebar_settings == "card") { echo 'cardSidebar'; } else if($sidebar_settings == "dots") { echo 'dotsSidebar'; } else { echo 'lineSidebar'; } ?><?php $fontselection = get_theme_mod( 'uw-madison-wp-2015_fonts_id' ); echo ' '.$fontselection; ?> <?php if(get_field('featured_pages_layouts')) { $page_layout = get_field('featured_pages_layouts'); if($page_layout == 'listr') { echo 'listRightSidebar'; }  } ?> <?php $header_slides_dots = get_theme_mod( 'uw-madison-wp-2015_headerslides_dots_id' ); if($header_slides_dots == true) { echo "hiddenSlideDots"; } ?> <?php $header_slides_arrows = get_theme_mod( 'uw-madison-wp-2015_headerslides_arrows_id' ); if($header_slides_arrows == true) { echo "hiddenSlideArrows"; } ?> <?php $header_slides_transition = get_theme_mod( 'uw-madison-wp-2015_headerslides_transition_id' ); if($header_slides_transition == true) { echo "headerSlidesFade"; } ?> <?php $logo_position = get_theme_mod( 'uw-madison-wp-2015_home_logo_position_id' ); if($logo_position == "center") { echo "hidemainlogo"; } ?> <?php $hideshownav = get_theme_mod( 'uw-madison-wp-2015_hide_show_nav_id' ); if($hideshownav == "yes") { echo "hideMainNav"; } ?>">




	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'uw-madison-wp-2015' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<?php $header_layout_settings = get_theme_mod( 'uw-madison-wp-2015_header_layout_id' ); 
				if($header_layout_settings == "righthand") { ?>
				 	<!-- uses righthand nav --> 
				 	
				 	<div class="search-youruw">
					 	<div class="search-youruw-container">
					 		<?php 
						 		$campustitle = get_theme_mod( 'uw-madison-wp-2015_campus_title_id' );	
						 		$campustitlelink = get_theme_mod( 'uw-madison-wp-2015_campus_title_link_id' );
						 		
						 			if($campustitle != "") { 
					 					if($campustitlelink != "") { ?>
					 					<a href="<?php echo $campustitlelink; ?>" class="campusTitle"><?php echo $campustitle; ?></a>
					 					<?php } else { ?>
					 						<div class="campusTitle"><?php echo $campustitle; ?></div>
					 					<?php } ?>
					 			<?php } ?>
					 			
					 		

						<div class="youruwGroup">
							
							
							<div class="uwresources">
								
								
									<?php if ( has_nav_menu( 'resources' ) ) { ?>
										<?php wp_nav_menu( array( 'theme_location' => 'resources' ) ); ?>
									<?php } ?>
								
							
							</div>
							
						<div class="youruw">
							<a href="#" class="youruwTrigger"><?php
								$menu_location = 'youruw'; 
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								
								if($menu_name) {
								
								echo esc_html($menu_name);
								
								} else {
									echo "Your UW";
								}
							?></a>
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
						<svg width="19px" height="19px" aria-label="Open Search" viewBox="0 0 19 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
   
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
				</div>

				 	
				 	<?php $header_image = get_header_image();
						  $header_alt_image = get_theme_mod( 'uw-madison-wp-2015_header_alt_image_id' );
						  
						  $logo_image = get_theme_mod( 'uw-madison-wp-2015_header_main_image_id' );
						  
						if ( $header_image ) { ?>
							<!-- A Header Image is assigned -->
							<?php if($header_alt_image) { ?>
								<!-- An Alt Image is also assigned -->
								<div class="logo-search-container withimage withaltimage">
									
							<?php } else { ?>
								<!-- A Header Alt Image is NOT assigned -->
								<div class="logo-search-container withimage noaltimage">
							<?php } ?>
							
						<?php } else if($logo_image) { ?>
							<?php if($header_alt_image) { ?>
								<!-- An Alt Image is also assigned -->
								<div class="logo-search-container withimage withaltimage">
									
							<?php } else { ?>
								<!-- A Header Alt Image is NOT assigned -->
								<div class="logo-search-container withimage noaltimage">
							<?php } ?>
						<?php } else { ?>

							<!-- A Header Image is NOT assigned -->
							<div class="logo-search-container noimage">
						<?php } ?>

			
				<div class="site-branding">
					<a href="#" class="mobileTrigger"><svg height="32px" aria-label="Open Menu" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg></a>
					
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php if(get_bloginfo('description') <> '') { ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php } ?>
					
					<?php
						// Check to see if the header image has been removed
						$header_image = get_header_image();
						$logo_image = get_theme_mod( 'uw-madison-wp-2015_header_main_image_id' );
						
						if ( $header_image ) { 
							//A Header Image is assigned

							// Compatibility with versions of WordPress prior to 3.4.
							if ( function_exists( 'get_custom_header' ) ) {
								// We need to figure out what the minimum width should be for our featured image.
								// This result would be the suggested width if the theme were to implement flexible widths.
								$header_image_width = get_theme_support( 'custom-header', 'width' );
							} else {
								$header_image_width = HEADER_IMAGE_WIDTH;
							}
							?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><span class="forScreenReaders">Logo Image</span>
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
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" class="mainLogoImg" alt="" />
					<?php if($header_alt_image) { ?>
					<img src="<?php echo $header_alt_image; ?>" class="altLogoImg" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
					<?php } ?>
				<?php /*endif;*/ // end check for featured image or standard header ?>
			</a>
			
			<?php } else if($logo_image) { //using new logo image assignment ?>
					
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><span class="forScreenReaders">Logo Image</span>
						
							<img src="<?php echo $logo_image; ?>" class="mainLogoImg" alt="" />
							<?php if($header_alt_image) { ?>
							<img src="<?php echo $header_alt_image; ?>" class="altLogoImg" alt="" />
							<?php } ?>
						<?php /*endif;*/ // end check for featured image or standard header ?>
					</a>
			
			<?php } else { // end check for removed header image ?>

						<!-- A Header Image is Not Assigned -->

						<div class="noimageLogo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage nologoImageAssigned"><span class="forScreenReaders">Logo Image</span>
							<?php $logo_noimage_settings = get_theme_mod( 'uw-madison-wp-2015_noimage_crest_id' ); if($logo_noimage_settings == "color") { ?>
								<!-- Full Color Crest Selected -->
								
								<img src="<?php echo get_template_directory_uri(); ?>/images/cl_logo.svg">
							<?php } else if($logo_noimage_settings == "hybrid") { ?>
								<!-- Hybrid Crest Selected -->

								<?php 
									$header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' );
								if($header_style == "opaque") { ?>
									<!-- Hybrid Selected with Opaque Header -->
									<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" class="hybrid">
									<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" class="hybrid_b">

								<?php } else { ?>
								<!-- Hybrid Logo with Transparent or Photo Header -->

									<?php if(is_front_page()) { ?>
									<!-- Hybrid Logo / Transparent Header or Photo Header / Homepage -->
										<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo.svg" class="hybrid">
										<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" class="hybrid_b">
									<?php } else { ?>
									<!-- Hybrid Logo / Transparent Header or Photo Header / Subpages -->

										<?php $header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' ); 

											if($header_style == "photo") {
										?>
											<!-- Hybrid Logo / Photo Header Only / Subpages -->
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo.svg" class="hybrid">
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" class="hybrid_b">
										<?php } else { ?>
											<!-- Hybrid Logo / Transparent Header Only / Subpages -->
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" class="hybrid">
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" class="hybrid_b">
										<?php } ?>
									<?php } ?>
								<?php } ?>

							<?php } else { ?>
								<!-- Outline Crest Selected -->
								<?php 
									$header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' );
									$header_layout_settings = get_theme_mod( 'uw-madison-wp-2015_header_layout_id' ); 
									if(is_front_page()) { ?>
									<!-- Outline Crest on Homepage -->
										<?php if($header_style == "opaque") { ?>
										<!-- Outline Crest / Homepage / Opaque Header -->
											<?php if($header_layout_settings == "righthand") { ?>
											<!-- Outline Crest / Homepage / Opaque Header / Right Hand Nav -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg">
											<?php } else { ?>
											<!-- Outline Crest / Homepage / Opaque Header / Bar Nav -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg">
											<?php } ?>
										<?php } else { ?>
										<!-- Outline Crest / Homepage / Transparent Header -->
											<?php $header_slides_style = get_theme_mod( 'uw-madison-wp-2015_header_slides_options_id' ); if($header_slides_style == "hidden") { ?>
												<!-- Outline Crest / Homepage / Hidden Slides -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg">
											<?php } else { ?>
												<!-- Outline Crest / Homepage / Visible Slides -->
												<img class="monochrome" src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg"> 
											<?php } ?>
										<?php } ?>
									<?php } else { ?>
									<!-- Outline Crest on Subpages -->
										<?php if($header_layout_settings == "righthand") { ?>
												<!-- Outline Crest / Right Hand Nav / Subpages  -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg">

										<?php } else { ?>
												<!-- Outline Crest / Bar Nav / Subpages -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg">

										<?php } ?>
																			<?php } ?>
							<?php } ?>
							
							<?php $taglinelocation = get_theme_mod('uw-madison-wp-2015_tagline_location_id');
								if($taglinelocation == "above") { ?>
									<div class="mainTitle tagAbove"><span><?php bloginfo( 'description' ); ?></span><?php bloginfo( 'name' ); ?></div></a></div>
								<?php } else { ?>
							<div class="mainTitle"><?php bloginfo( 'name' ); ?><span><?php bloginfo( 'description' ); ?></span></div></a></div>
							
							<?php } ?>
						
						
			<?php } ?>
					
				</div><!-- .site-branding -->
				
				
								
			</div>
			
			<div class="main-navigation-container">
		
			<nav id="site-navigation" class="main-navigation <?php $main_menu_dropdown = get_theme_mod( 'uw-madison-wp-2015_dropdowns_id' ); if($main_menu_dropdown == "enabled") { echo "dropdownEnabled"; } ?>" role="navigation">
				<div class="site-navigation-container">
					
					<?php 
						
						$main_menu_dropdown = get_theme_mod( 'uw-madison-wp-2015_dropdowns_id' );
					
						if($main_menu_dropdown == "enabled") {
							
							wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
						
						} else {
							wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); 
						}
						
						
						?>
				</div>
			</nav><!-- #site-navigation -->
		
			</div>
				
				<?php } else { ?>  
				
					<!-- uses navbar -->
					<?php $header_image = get_header_image();
						  $header_alt_image = get_theme_mod( 'uw-madison-wp-2015_header_alt_image_id' );
						  
						  $logo_image = get_theme_mod( 'uw-madison-wp-2015_header_main_image_id' );
						  
						if ( $header_image ) { ?>
							<?php if($header_alt_image) { ?>
								<div class="logo-search-container withimage withaltimage">
							<?php } else { ?>
								<div class="logo-search-container withimage noaltimage">
							<?php } ?>
						
						<?php } else if($logo_image) { ?>
								<?php if($header_alt_image) { ?>
									<div class="logo-search-container withimage withaltimage">
								<?php } else { ?>
									<div class="logo-search-container withimage noaltimage">
								<?php } ?>
						<?php } else { ?>
							<div class="logo-search-container noimage">
						<?php } ?>

			
				<div class="site-branding">
					<a href="#" class="mobileTrigger"><svg height="32px" aria-label="Open Menu" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg></a>
					
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php if(get_bloginfo('description') <> '') { ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php } ?>
					
					<?php
						// Check to see if the header image has been removed
						$header_image = get_header_image();
						
						$logo_image = get_theme_mod( 'uw-madison-wp-2015_header_main_image_id' );
						
						if ( $header_image ) { 
							// Compatibility with versions of WordPress prior to 3.4.
							if ( function_exists( 'get_custom_header' ) ) {
								// We need to figure out what the minimum width should be for our featured image.
								// This result would be the suggested width if the theme were to implement flexible widths.
								$header_image_width = get_theme_support( 'custom-header', 'width' );
							} else {
								$header_image_width = HEADER_IMAGE_WIDTH;
							}
							?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><span class="forScreenReaders">Logo Image</span>
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
			
			<?php } else if($logo_image) { //using new logo image assignment ?>
					
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><span class="forScreenReaders">Logo Image</span>
						
							<img src="<?php echo $logo_image; ?>" class="mainLogoImg" alt="" />
							<?php if($header_alt_image) { ?>
							<img src="<?php echo $header_alt_image; ?>" class="altLogoImg" alt="" />
							<?php } ?>
						<?php /*endif;*/ // end check for featured image or standard header ?>
					</a>
			
			<?php } else { // end check for removed header image ?>
						<div class="noimageLogo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><span class="forScreenReaders">Logo Image</span>
							<?php $logo_noimage_settings = get_theme_mod( 'uw-madison-wp-2015_noimage_crest_id' ); if($logo_noimage_settings == "color") { ?>
								
								<img src="<?php echo get_template_directory_uri(); ?>/images/cl_logo.svg">
								<?php } else if($logo_noimage_settings == "hybrid") { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo.svg" class="hybrid">
								<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" class="hybrid_b">

							<?php } else { ?>
							
								<?php 
									$header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' );
									$header_layout_settings = get_theme_mod( 'uw-madison-wp-2015_header_layout_id' ); 
									if(is_front_page()) { ?>
										<?php if($header_style == "opaque") { ?>
											<?php if($header_layout_settings == "righthand") { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg">
											<?php } else { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg">
											<?php } ?>
										<?php } else { ?>

												<?php $header_slides_style = get_theme_mod( 'uw-madison-wp-2015_header_slides_options_id' ); if($header_slides_style == "hidden") { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg">
											<?php } else { ?>
												<img class="monochrome" src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg"> 
											<?php } ?>
										<?php } ?>
									<?php } else { ?>
									
										<?php if($header_layout_settings == "righthand") { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg">

										<?php } else { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg">

										<?php } ?>
																			<?php } ?>
							<?php } ?>
							<?php $taglinelocation = get_theme_mod('uw-madison-wp-2015_tagline_location_id');
								if($taglinelocation == "above") { ?>
									<div class="mainTitle tagAbove"><span><?php bloginfo( 'description' ); ?></span><?php bloginfo( 'name' ); ?></div></a></div>
								<?php } else { ?>
							<div class="mainTitle"><?php bloginfo( 'name' ); ?><span><?php bloginfo( 'description' ); ?></span></div></a></div>
							
							<?php } ?>						
						
			<?php } ?>
					
				</div><!-- .site-branding -->
				
				
				<div class="search-youruw">
						<div class="youruwGroup">
							
							<div class="uwresources">
								
								
									<?php if ( has_nav_menu( 'resources' ) ) { ?>
										<?php wp_nav_menu( array( 'theme_location' => 'resources' ) ); ?>
									<?php } ?>
								
							
							</div>

							
							<div class="youruw">
								<a href="#" class="youruwTrigger"><?php
									$menu_location = 'youruw';
									$menu_locations = get_nav_menu_locations();
									$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
									$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
									
									if($menu_name) {
									
									echo esc_html($menu_name);
									
									} else {
										echo "Your UW";
									}
								?></a>
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
						<svg width="19px" height="19px" aria-label="Open Search" viewBox="0 0 19 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
   
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
				
			</div>
		
			<nav id="site-navigation" class="main-navigation <?php $main_menu_dropdown = get_theme_mod( 'uw-madison-wp-2015_dropdowns_id' ); if($main_menu_dropdown == "enabled") { echo "dropdownEnabled"; } ?>" role="navigation">
				<div class="site-navigation-container">
					
					<?php 
						
						$main_menu_dropdown = get_theme_mod( 'uw-madison-wp-2015_dropdowns_id' );
					
						if($main_menu_dropdown == "enabled") {
							
							wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
						
						} else {
							wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); 
						}
						
						
						?>
				</div>
			</nav><!-- #site-navigation -->
					
				<?php } ?>
		
		
		
	</header><!-- #masthead -->
  
  
	
  
	<div class="featureHeader">
		
		
		
		<?php $logo_position = get_theme_mod( 'uw-madison-wp-2015_home_logo_position_id' ); if($logo_position == "center") { ?>
		
				<?php if($logo_image) { ?>
		
					
					<img src="<?php echo $logo_image; ?>" alt="" class="centeredSiteLogo" />
				
				<?php } else { ?>
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
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" class="centeredSiteLogo" />
				<?php } ?>
		
		<?php } ?>
		
		
		<?php $header_slides_style = get_theme_mod( 'uw-madison-wp-2015_header_slides_options_id' ); if($header_slides_style == "hidden") { ?>
		
		<?php } else { ?> 
				
		<?php 
			if(is_front_page() || $header_style == "photo") { ?>
				<?php if(is_front_page()) {
						$args = array( 'post_type' => 'headerslides', 'posts_per_page' => 10 );

				 } else { 
				 		$args = array( 'post_type' => 'headerslides', 'posts_per_page' => 1 );

				 }?>



				<?php 
					$loop = new WP_Query( $args );
					
					if($loop->have_posts()) { ?>
					<?php $loopcount = $loop->post_count; 
						if($loopcount > 1) {
					?>
						<div class="main-gallery">
						
					<?php } else { ?>
						<div class="heroSingle">
					<?php } ?>

					<?php 
										$photo_header_size = get_theme_mod( 'uw-madison-wp-2015_photo_header_size_id' );

										$home_photo_header_size = get_theme_mod( 'uw-madison-wp-2015-home_photo_header_size_id' );
										
									?>
					
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

						<?php if(is_front_page()) { ?>
							<?php if($home_photo_header_size) { ?>
								<div class="gallery-cell" style="height:<?php echo $home_photo_header_size ?>px;">
							<?php } else { ?>
								<div class="gallery-cell">
							<?php } ?>

						<?php } else { ?>
							<?php if($photo_header_size) { ?>
								<div class="gallery-cell" style="height:<?php echo $photo_header_size ?>px;">
							<?php } else { ?>
								<div class="gallery-cell">
							<?php } ?>
							

						<?php } ?>

						<?php 

							$image = get_field('hero_image');
							$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
							
							if( $image ) {
								
								 $attachment_id = get_field('hero_image'); $size = "hero-image"; 
								 $image = wp_get_attachment_image_src($attachment_id, $size);
								
								
								
								//$imgurl = wp_get_attachment_image_src( $image, $size ); ?>
								
								<div class="heroImageIeMask"></div>
								<svg class="heroImageContainerSVG" aria-label="Featured Image">

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
								
								<?php 
									$video = get_field('hero_video');
									
									if( $video ) { ?>
									<!-- If a Hero Video is set -->
									
									<?php
										
										$hidebluroption = get_field('disable_blur_filter');
										
										if($hidebluroption) {
										
											if( in_array('yes', $hidebluroption) ) { ?>
									
									<?php 	} else { ?>
											<div class="heroImageBlur heroVideoBlur"><div class="heroImageBlurInner"></div></div>
									<?php 	} 
										} else { ?>
											<div class="heroImageBlur heroVideoBlur"><div class="heroImageBlurInner"></div></div>
									<?php } ?>
									
									
								</foreignObject>
								</svg>
								
								
								
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
											
											<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; "></div></div>
									<?php 	} 
										} else { ?>
											<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center; "></div></div>
									<?php } ?>

								
								</foreignObject>
								</svg>

								<?php if($header_style == "photo") { ?>
								
								
									<?php
										
										$hidebluroption = get_field('disable_blur_filter');
										
										if($hidebluroption) {
										
											if( in_array('yes', $hidebluroption) ) { ?>
									
									<?php 	} else { ?>
											<div class="heroImageBlur secondaryBlur"><div class="heroImageBlurInnerAlt" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;"></div></div>
									<?php 	} 
										} else { ?>
											<div class="heroImageBlur secondaryBlur"><div class="heroImageBlurInnerAlt" style="background-image: url(<?php echo $image[0] ?>); background-size: cover; background-position: <?php $herovalign = get_field('hero_image_vertical_alignment'); if($herovalign) { echo $herovalign; } else { echo "center"; } ?> center;"></div></div>
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
								
								<?php } ?>

							<?php } else { ?>
								<svg class="heroImageContainerSVG" aria-label="Featured Image">

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
								<svg class="heroImageContainerSVG" aria-label="Featured Image">

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
		
		<?php } ?>
	</div>
	
	
 
	<?php if(is_front_page()) { ?>
		<?php $background_color = get_background_color(); ?>
		<div id="content" class="site-content row">
			<?php $header_frosted_glass = get_theme_mod( 'uw-madison-wp-2015_headerslides_frostedglass_id' ); if($header_frosted_glass == true) {  ?>
			<div class="whiteGradient">
				<div class="frostedShelf" <?php if($background_color) { ?>style="background: -moz-linear-gradient(top,  rgba(255,255,255,0.4) 0%, #<?php echo $background_color; ?> 100%); background: -webkit-linear-gradient(top,  rgba(255,255,255,0.4) 0%, #<?php echo $background_color; ?> 100%);
background: linear-gradient(to bottom,  rgba(255,255,255,0.4) 0%, #<?php echo $background_color; ?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#66ffffff', endColorstr='#<?php echo $background_color; ?>',GradientType=0 );" <?php } ?>></div>
				<div class="frostedImage">
					<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 10 ); 

						
						$loop = new WP_Query( $args );

					
						if($loop->have_posts()) { ?>

							<?php $loopcount = $loop->post_count; 
						if($loopcount > 1) {
					?>
							<div class="gallery-b">
						<?php } else { ?>
								<div class="reflection-b">
							<?php } ?>
							<?php while ( $loop->have_posts() ) : $loop->the_post(); 

								$video = get_field('hero_video');
									
									

								$image = get_field('hero_image');
							$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
							
							if( $video ) { ?>
									<div class="gallery-cell">
										<video autoplay loop id="bgvid">
										    <source src="<?php echo $video ?>" type="video/mp4">
										</video>
									</div>
							<?php } else {
								
								 $attachment_id = get_field('hero_image'); $size = "hero-image"; 
								 $image = wp_get_attachment_image_src($attachment_id, $size); ?>
								 <div class="gallery-cell" style="background: url(<?php echo $image[0]; ?>) no-repeat; background-size: cover; background-position: center center">
								 	
								 </div>
							
							<?php }

							endwhile;

						}
					?>
							</div>
				</div>
			</div><?php } ?>
				
	<?php } else { ?>
		<div id="content" class="site-content post-content row">
			<?php $header_frosted_glass = get_theme_mod( 'uw-madison-wp-2015_headerslides_frostedglass_subpages_id' ); if($header_frosted_glass == true) {  ?>
			<div class="whiteGradient">
				<div class="frostedShelf"></div>
				<div class="frostedImage">
					
					<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 1 ); 
						
						$loop = new WP_Query( $args );
					
						if($loop->have_posts()) { ?>
							<div class="reflection-b">
							<?php while ( $loop->have_posts() ) : $loop->the_post(); 

								$video = get_field('hero_video');
									
									

								$image = get_field('hero_image');
							$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
							
							if( $video ) { ?>
									<div class="gallery-cell">
										<video autoplay loop id="bgvid">
										    <source src="<?php echo $video ?>" type="video/mp4">
										</video>
									</div>
							<?php } else {
								
								 $attachment_id = get_field('hero_image'); $size = "hero-image"; 
								 $image = wp_get_attachment_image_src($attachment_id, $size); ?>
								 <div class="gallery-cell" style="background: url(<?php echo $image[0]; ?>) no-repeat; background-size: cover; background-position: center center">
								 	
								 </div>
							
							<?php }

							endwhile;
						}
					?>
							</div>

				</div>
			</div>
				<?php } ?>
				
				
	<?php } ?>
	
