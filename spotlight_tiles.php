<?php if (is_front_page()){ ?>


<section class="tiledSpotlight">
	<h1><span class="screen-reader-text">Check out the latest news and articles.</span></h1>
	<?php $args = array( 
           'post__not_in' => get_option( 'sticky_posts' )            
        ); 
		query_posts($args); ?>
	
<div class="grid">
	
  
	
  <div class="grid-sizer"></div>
  <div class="gutter-sizer"></div>
  <?php while (have_posts()) : the_post(); ?>
  <?php if ( has_post_thumbnail() ) { ?>
							  
							  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
$height = $thumb['2']; $height = $height; ?>
						<?php } 
							else{ ?>
								<?php $height = "300"; ?>							
						<?php }
						?>
	  <div class="grid-item tiltWrapper custom" data-maxangle="4" data-tiltdepth="70">
		  
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
						
						<?php if ( has_post_thumbnail() ) { ?>
							  <?php the_post_thumbnail('medium'); ?>
						<?php } 
							else{ ?>
								<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
							<?php }
						?>
						
						
						
						
					</div>
		
					
				</div>
				<div class="plane level2">
					<div class="middleImageSample">
						<div class="whiteContent">
							<h2><?php the_title(); ?></h2>
							<div><?php the_excerpt(); ?></div>
							
							<div class="plane level3">
								<div class="month"><?php the_time('M') ?></div>
								<div class="date"><?php the_time('jS') ?></div>
								<div class="foregroundImageSample"></div>
							</div>

							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	  
	  
   <?php endwhile; ?>
   <?php wp_reset_query(); ?>
  
</div>



	
	
		
	
	
</section>

<?php } else { ?>
<section class="tiledSpotlight">
	<h1><span class="screen-reader-text">Check out the latest news and articles.</span></h1>
	
	
<div class="grid">
	
  
	
  <div class="grid-sizer"></div>
  <div class="gutter-sizer"></div>
  <?php while (have_posts()) : the_post(); ?>
  <?php if ( has_post_thumbnail() ) { ?>
							  
							  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
$height = $thumb['2']; $height = $height; ?>
						<?php } 
							else{ ?>
								<?php $height = "300"; ?>							
						<?php }
						?>
	  <div class="grid-item tiltWrapper custom" data-maxangle="4" data-tiltdepth="70">
		  <div class="tiltWrapperSize">
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
    <!-- Generator: Sketch 3.4 (15575) - http://www.bohemiancoding.com/sketch -->
    <title>card_styles</title>
    <desc>Created with Sketch.</desc>
    <defs>
        <linearGradient x1="4.94598641%" y1="41.6499891%" x2="74.833257%" y2="71.7731228%" id="linearGradient-1">
            <stop stop-color="#686868" stop-opacity="0.395833333" offset="0%"></stop>
            <stop stop-color="#545454" stop-opacity="0.658203125" offset="100%"></stop>
        </linearGradient>
        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-2">
            <stop stop-color="#FFFFFF" stop-opacity="0" offset="0%"></stop>
            <stop stop-color="#FFFFFF" stop-opacity="0.400418931" offset="100%"></stop>
        </linearGradient>
    </defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-224.000000, -133.000000)">
            <g id="card_styles" sketch:type="MSLayerGroup" transform="translate(224.000000, 133.000000)">
                <path d="M0.953125,378.058594 L0.953125,246.631883 L316.628906,341.71875 L0.953125,378.058594 Z" id="Path-2" fill="url(#linearGradient-1)" sketch:type="MSShapeGroup"></path>
                <path d="M0.500197037,377.763682 L380.500197,377.763682 L380.500197,296 L0.500197037,377.763682 Z" id="Path-1" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                <path d="M0.500197037,155.734375 L380.500197,275.894531 L380.500197,0.0606841001 L1.13333794,0.0606841001 L0.500197037,155.734375 Z" id="Path-3" fill="url(#linearGradient-2)" sketch:type="MSShapeGroup"></path>
            </g>
        </g>
    </g>
</svg></div>
						
						<?php if ( has_post_thumbnail() ) { ?>
							  <?php the_post_thumbnail('medium'); ?>
						<?php } 
							else{ ?>
								<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
							<?php }
						?>
						
						
						
						
					</div>
		
					
				</div>
				<div class="plane level2">
					<div class="middleImageSample">
						<div class="whiteContent">
							<h2><?php the_title(); ?></h2>
							<div><?php the_excerpt(); ?></div>
							
							<div class="plane level3">
								<div class="month"><?php the_time('M') ?></div>
								<div class="date"><?php the_time('jS') ?></div>
								<div class="foregroundImageSample"></div>
							</div>

							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	  </div>
	  
   <?php endwhile; ?>
   <?php wp_reset_query(); ?>
  
</div>


<div class="postsNavigation">
	<?php the_posts_navigation(); ?>
</div>
		
	
	
</section>
	
<?php } ?>