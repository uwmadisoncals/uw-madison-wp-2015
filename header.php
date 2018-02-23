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


<?php $fp_tracking = get_theme_mod("uw-madison-wp-2015_fp_id");  if($fp_tracking) { ?>

	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '<?php echo $fp_tracking ?>'); // Insert your pixel ID here.
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=<?php echo $fp_tracking ?>&ev=PageView&noscript=1"
	/></noscript>
	<!-- DO NOT MODIFY -->
	<!-- End Facebook Pixel Code -->

<?php } ?>

<?php $eq_tracking = get_theme_mod("uw-madison-wp-2015_eq_id");  if($eq_tracking) { ?>
<script>
    var _elqQ = _elqQ || [];
    _elqQ.push(['elqSetSiteId', '<?php echo $eq_tracking ?>']);
    _elqQ.push(['elqTrackPageView']);
    
    (function () {
        function async_load() {
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
            s.src = '//img04.en25.com/i/elqCfg.min.js';
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        }
        if (window.addEventListener) window.addEventListener('DOMContentLoaded', async_load, false);
        else if (window.attachEvent) window.attachEvent('onload', async_load); 
    })();
</script>

<?php } ?>


<?php $ga_tracking = get_theme_mod("uw-madison-wp-2015_ga_id");  if($ga_tracking) { ?>

	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', '<?php echo $ga_tracking ?>', 'auto');
	ga('send', 'pageview');

	</script>

<?php } ?>


<?php $hj_tracking = get_theme_mod("uw-madison-wp-2015_hj_id");  if($hj_tracking) { ?>

<!-- Hotjar Tracking Code -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:<?php echo $hj_tracking ?>,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<?php } ?>


<?php $gcse = get_theme_mod("uw-madison-wp-2015_gcse_id"); ?>
<?php if($gcse != "") { ?>
		
<script>



  (function() {
    var cx = '<?php echo $gcse ?>';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<?php } ?>

</head>

<body <?php body_class(); ?> style="background-color: #<?php background_color(); ?>">


<?php $max_page_width = get_theme_mod( 'uw-madison-wp-2015_maxpgwidth_id' ); 
		
		if($max_page_width) {

			if($max_page_width == "1500") {
				$page_width_value = "";
				$page_width_class = "";
			} else {
				$page_width_value = 'margin: 0 auto; max-width: '.$max_page_width.'px';
				$page_width_class = "inset";
			}

		} else {
			$page_width_value = "";
			$page_width_class = "";
		}

?>

	<div class="loadCover">
		<div class="loadLogo"></div>
	</div>

<div class="searchUI" aria-hidden="true"><?php get_search_form(); ?><a href="#" class="searchClose"><svg enable-background="new 0 0 32 32" aria-label="Close Search" height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><polyline fill="none" points="   649,137.999 675,137.999 675,155.999 661,155.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   653,155.999 649,155.999 649,141.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   661,156 653,162 653,156  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/></g><g><path d="M11.312,12.766c0.194,0.195,0.449,0.292,0.704,0.292c0.255,0,0.51-0.097,0.704-0.292c0.389-0.389,0.389-1.02,0-1.409   L4.755,3.384c-0.389-0.389-1.019-0.389-1.408,0s-0.389,1.02,0,1.409L11.312,12.766z"/><path d="M17.407,16.048L28.652,4.793c0.389-0.389,0.389-1.02,0-1.409c-0.389-0.389-1.019-0.561-1.408-0.171L15.296,15   c0,0-0.296,0-0.296,0s0,0.345,0,0.345L3.2,27.303c-0.389,0.389-0.315,1.02,0.073,1.409c0.194,0.195,0.486,0.292,0.741,0.292   s0.528-0.097,0.722-0.292L15.99,17.458l11.249,11.255c0.194,0.195,0.452,0.292,0.706,0.292s0.511-0.097,0.705-0.292   c0.389-0.389,0.39-1.02,0.001-1.409L17.407,16.048z"/></g></svg></a><?php if($gcse != "") { ?><div><gcse:searchresults></gcse:searchresults></div><?php } else { ?><div id="ajaxResults"></div><?php } ?></div>
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







<div id="page" style="<?php echo $page_width_value; ?>" class="hfeed site <?php echo $page_width_class; ?> <?php $editor = get_field('page_editor'); if($editor == "advanced") { echo "apesetup"; } ?> <?php $header_slides_style = get_theme_mod( 'uw-madison-wp-2015_header_slides_options_id' ); if($header_slides_style == "hidden") { echo "hiddenSlides"; } else { echo "visibleSlides"; } ?> <?php $header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' ); if($header_style == "opaque") { echo "solidHeader"; } else if($header_style == "photo") { echo "photoHeader"; } else { echo "photoHeader"; } ?> <?php $home_layout_settings = get_theme_mod( 'uw-madison-wp-2015_layout_id' ); if($home_layout_settings == "tiles") { echo "tiledPosts"; }; if($home_layout_settings == "right_sidebar") { echo "postsRightSidebar"; } ?> <?php $header_layout_settings = get_theme_mod( 'uw-madison-wp-2015_header_layout_id' ); if($header_layout_settings == "righthand") { echo "rightHandNav"; } else { echo "navBar"; } ?> <?php if( get_field('hide_the_side_navigation')) { echo "hiddenSidebar"; } ?> <?php if( get_field('page_theme') == 'documentation') { echo 'documentationSection'; } ?> <?php $sidebar_settings = get_theme_mod( 'uw-madison-wp-2015_sidebar_style_id' ); if($sidebar_settings == "card") { echo 'cardSidebar'; } else if($sidebar_settings == "dots") { echo 'dotsSidebar'; } else { echo 'lineSidebar'; } ?><?php $fontselection = get_theme_mod( 'uw-madison-wp-2015_fonts_id' ); echo ' '.$fontselection; ?> <?php if(get_field('featured_pages_layouts')) { $page_layout = get_field('featured_pages_layouts'); if($page_layout == 'listr') { echo 'listRightSidebar'; }  } ?> <?php $header_slides_dots = get_theme_mod( 'uw-madison-wp-2015_headerslides_dots_id' ); if($header_slides_dots == true) { echo "hiddenSlideDots"; } ?> <?php $header_slides_arrows = get_theme_mod( 'uw-madison-wp-2015_headerslides_arrows_id' ); if($header_slides_arrows == true) { echo "hiddenSlideArrows"; } ?> <?php $header_slides_transition = get_theme_mod( 'uw-madison-wp-2015_headerslides_transition_id' ); if($header_slides_transition == true) { echo "headerSlidesFade"; } ?> <?php $logo_position = get_theme_mod( 'uw-madison-wp-2015_home_logo_position_id' ); if($logo_position == "center") { echo "hidemainlogo"; } ?> <?php $navtextsize = get_theme_mod( 'uw-madison-wp-2015_nav_text_size_id' ); if($navtextsize == "large") { echo "largeNavText"; } ?> <?php $hideshownav = get_theme_mod( 'uw-madison-wp-2015_hide_show_nav_id' ); if($hideshownav == "yes") { echo "hideMainNav"; } ?>">




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
					 			<?php } else { ?>
								 		<a href="http://wisc.edu" class="campusTitle">UNIVERSITY of WISCONSIN MADISON</a>
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
					<a href="#" class="mobileTrigger"><svg height="32px" aria-label="Open Menu"  style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg></a>

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

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><!--<span class="forScreenReaders">Logo Image</span>-->
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
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" class="mainLogoImg" alt="Logo" />
					<?php if($header_alt_image) { ?>
					<img src="<?php echo $header_alt_image; ?>" class="altLogoImg" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="Logo" />
					<?php } ?>
				<?php /*endif;*/ // end check for featured image or standard header ?>
			</a>

			<?php } else if($logo_image) { //using new logo image assignment ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><!--<span class="forScreenReaders">Logo Image</span>-->

							<img src="<?php echo $logo_image; ?>" class="mainLogoImg" alt="Logo" />
							<?php if($header_alt_image) { ?>
							<img src="<?php echo $header_alt_image; ?>" class="altLogoImg" alt="Logo" />
							<?php } ?>
						<?php /*endif;*/ // end check for featured image or standard header ?>
					</a>

			<?php } else { // end check for removed header image ?>

						<!-- A Header Image is Not Assigned -->

						<div class="noimageLogo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage nologoImageAssigned"><!--<span class="forScreenReaders">Logo Image</span>-->
							<?php $logo_noimage_settings = get_theme_mod( 'uw-madison-wp-2015_noimage_crest_id' ); if($logo_noimage_settings == "color") { ?>
								<!-- Full Color Crest Selected -->

								<img src="<?php echo get_template_directory_uri(); ?>/images/cl_logo.svg">
							<?php } else if($logo_noimage_settings == "hybrid") { ?>
								<!-- Hybrid Crest Selected -->

								<?php
									$header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' );
								if($header_style == "opaque") { ?>
									<!-- Hybrid Selected with Opaque Header -->
									<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" alt="Logo" class="hybrid">
									<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" alt="Logo" class="hybrid_b">

								<?php } else { ?>
								<!-- Hybrid Logo with Transparent or Photo Header -->

									<?php if(is_front_page()) { ?>
									<!-- Hybrid Logo / Transparent Header or Photo Header / Homepage -->
										<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo.svg" alt="Logo" class="hybrid">
										<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" alt="Logo" class="hybrid_b">
									<?php } else { ?>
									<!-- Hybrid Logo / Transparent Header or Photo Header / Subpages -->

										<?php $header_style = get_theme_mod( 'uw-madison-wp-2015_header_style_options_id' );

											if($header_style != "opaque") {
										?>
											<!-- Hybrid Logo / Photo Header Only / Subpages -->
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo.svg" alt="Logo" class="hybrid">
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" alt="Logo" class="hybrid_b">
										<?php } else { ?>
											<!-- Hybrid Logo / Transparent Header Only / Subpages -->
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" alt="Logo" class="hybrid">
											<img src="<?php echo get_template_directory_uri(); ?>/images/hybrid_logo_dark.svg" alt="Logo" class="hybrid_b">
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
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg" alt="Logo">
											<?php } else { ?>
											<!-- Outline Crest / Homepage / Opaque Header / Bar Nav -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg" alt="Logo">
											<?php } ?>
										<?php } else { ?>
										<!-- Outline Crest / Homepage / Transparent Header -->
											<?php $header_slides_style = get_theme_mod( 'uw-madison-wp-2015_header_slides_options_id' ); if($header_slides_style == "hidden") { ?>
												<!-- Outline Crest / Homepage / Hidden Slides -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg" alt="Logo">
											<?php } else { ?>
												<!-- Outline Crest / Homepage / Visible Slides -->
												<img class="monochrome" src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg" alt="Logo">
											<?php } ?>
										<?php } ?>
									<?php } else { ?>
									<!-- Outline Crest on Subpages -->
										<?php if($header_layout_settings == "righthand") { ?>
												<!-- Outline Crest / Right Hand Nav / Subpages  -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo_b.svg" alt="Logo">

										<?php } else { ?>
												<!-- Outline Crest / Bar Nav / Subpages -->
												<img src="<?php echo get_template_directory_uri(); ?>/images/bw_logo.svg" alt="Logo">

										<?php } ?>
																			<?php } ?>
							<?php } ?>

							<?php $taglinelocation = get_theme_mod('uw-madison-wp-2015_tagline_location_id');
								if($taglinelocation == "above") { ?>
									<div class="mainTitle tagAbove"><div class="subTitle"><span><?php bloginfo( 'description' ); ?></span></div><div class="primaryTitle"><span><?php bloginfo( 'name' ); ?><span></div></div></a></div>
								<?php } else { ?>
							<div class="mainTitle"><div class="primaryTitle"><span><?php bloginfo( 'name' ); ?></span></div><div class="subTitle"><span><?php bloginfo( 'description' ); ?></span></div></div></a></div>

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
					<a href="#" class="mobileTrigger"><svg height="32px" aria-label="Open Menu"  style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg></a>

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

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><!--<span class="forScreenReaders">Logo Image</span>-->
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
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="Logo" />
				<?php /*endif;*/ // end check for featured image or standard header ?>
			</a>

			<?php } else if($logo_image) { //using new logo image assignment ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage"><!--<span class="forScreenReaders">Logo Image</span>-->

							<img src="<?php echo $logo_image; ?>" class="mainLogoImg" alt="Logo" />
							<?php if($header_alt_image) { ?>
							<img src="<?php echo $header_alt_image; ?>" class="altLogoImg" alt="Logo" />
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
									<div class="mainTitle tagAbove"><div class="subTitle"><span><?php bloginfo( 'description' ); ?></span></div><div class="primaryTitle"><span><?php bloginfo( 'name' ); ?><span></div></div></a></div>
								<?php } else { ?>
							<div class="mainTitle"><div class="primaryTitle"><span><?php bloginfo( 'name' ); ?></span></div><div class="subTitle"><span><?php bloginfo( 'description' ); ?></span></div></div></a></div>

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

     <!-- test comment -->

		<?php $logo_position = get_theme_mod( 'uw-madison-wp-2015_home_logo_position_id' ); if($logo_position == "center") { ?>

				<?php if($logo_image) { ?>


					<img src="<?php echo $logo_image; ?>" alt="Logo" class="centeredSiteLogo" />

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
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="Logo" class="centeredSiteLogo" />
				<?php } ?>

		<?php } ?>


		<?php $header_slides_style = get_theme_mod( 'uw-madison-wp-2015_header_slides_options_id' ); if($header_slides_style == "hidden") { ?>
				<!-- Set to hidden -->
		<?php } else { ?>

		<?php
			if(is_front_page() || $header_style != "opaque") { ?>
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

						<?php $herosource = get_field('content_source'); ?>
							<?php $herovalign = get_field('hero_image_vertical_alignment'); ?>
								

								

							<?php  if($herosource == "latestpost") {
								 	include 'inc/header_latest_posts.php'; 
							} else if($herosource == "specificpost") { //Specific Post Header Slides?>
									<?php include 'inc/header_specific_post.php'; ?>
							<?php } else if($herosource == "search") { ?>
									<?php include 'inc/header_search.php'; ?>
							<?php } else if($herosource == "remote") { ?>
									<?php include 'inc/header_remote.php'; ?>
							<?php } else { ?>
									<?php include 'inc/header_static.php'; ?>
						<?php } //end content source ?>
					<?php endwhile; ?>
					</div>
					<?php } else { ?>
								

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
				<?php if($background_color && $page_width_class == "inset") { ?>
						<div class="frostedShelf" style="background: -moz-linear-gradient(top,  rgba(255,255,255,0.6) 0%, #f7f7f7 100%); background: -webkit-linear-gradient(top,  rgba(255,255,255,0.6) 0%, #f7f7f7 100%);
background: linear-gradient(to bottom,  rgba(255,255,255,0.6) 0%, #f7f7f7 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#66ffffff', endColorstr='#f7f7f7',GradientType=0 );"></div>
				<?php } else if($background_color && $page_width_class != "inset") { ?>
						<div class="frostedShelf" style="background: -moz-linear-gradient(top,  rgba(255,255,255,0.6) 0%, #<?php echo $background_color; ?> 100%); background: -webkit-linear-gradient(top,  rgba(255,255,255,0.6) 0%, #<?php echo $background_color; ?> 100%);
background: linear-gradient(to bottom,  rgba(255,255,255,0.6) 0%, #<?php echo $background_color; ?> 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#66ffffff', endColorstr='#<?php echo $background_color; ?>',GradientType=0 );"></div>
				<?php } else { ?>
					<div class="frostedShelf"></div>
				<?php } ?>


				
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


							$herosource = get_field('content_source'); ?>
							
								
							<?php if($herosource == "latestpost") { ?>

								<?php $heroterms = get_field('hero_post_categories'); 
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
								<?php //$attachment_id = get_field('hero_image'); $size = "hero-image";
								 //$image = wp_get_attachment_image_src($attachment_id, $size); ?>
								 <div class="gallery-cell" style="background: url(<?php the_post_thumbnail_url('large') ?>) no-repeat; background-size: cover; background-position: center center">

								 </div>

								 <?php }

									// Restore original Post Data
									wp_reset_postdata();
								} ?>
							<?php } else if($herosource == "specificpost") { ?>
									<?php // The Query
								$post_object = get_field('show_specific_post');

								//$query2 = new WP_Query( $args2 );

								if ( $post_object ) {
									// The 2nd Loop
									$post = $post_object;
									setup_postdata( $post ); ?>

								<?php //$attachment_id = get_field('hero_image'); $size = "hero-image";
								 //$image = wp_get_attachment_image_src($attachment_id, $size); ?>
								 <div class="gallery-cell" style="background: url(<?php the_post_thumbnail_url('large') ?>) no-repeat; background-size: cover; background-position: center center">

								 </div>

								 <?php }

									// Restore original Post Data
									wp_reset_postdata();
								 ?>
							<?php } else if($herosource == "search") { 

							

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


							} else if($herosource == "remote") { 

							

								$video = get_field('hero_video');



								$image = get_field('remote_image_fallback');
							$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)

							if( $video ) { ?>
									<div class="gallery-cell">
										<video autoplay loop id="bgvid">
										    <source src="<?php echo $video ?>" type="video/mp4">
										</video>
									</div>
							<?php } else {

								 $attachment_id = get_field('remote_image_fallback'); $size = "hero-image";
								 $image = wp_get_attachment_image_src($attachment_id, $size); ?>
								 <div class="gallery-cell" style="background: url() no-repeat; background-size: cover; background-position: center center">

								 </div>

							<?php }

							  } else if($herosource == "static") { 

							

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

							 } 

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
				<div class="frostedShelf check"></div>
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
