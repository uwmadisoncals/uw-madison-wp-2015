<?php
/**
 * Template Name: CALS Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>

	<div id="primary" class="content-area <?php $image = get_field('hero_image_pages'); if($image) { echo "heroImage"; } ?>">
		
		<main id="main" class="site-main" role="main">
			
			<div class="cf pagePadding">
				
					
					<div class="homeLeadSection">
						<div class="site-content-inner">
							
							<div class="row">
								<div class="span-66">
									<header class="entry-header">
										<h1 class="entry-title">Creating Solutions that Work</h1>
									</header>
									
									<div class="entry-content">
										<p>Located at the heart of the University of Wisconsin-Madison campus, the College of Agricultural and Life Sciences (CALS) is one of the oldest and most prestigious colleges devoted to the study of our living world.</p>
									</div>
							
								</div>
								
								<div class="span-33">
									<div class="spotlight right-sidebar spotlight-page">
								<div class="sidebarWrapper">
								
									<div class="sidebarfold">
										<svg width="38px" height="33px" viewBox="0 0 38 33" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										    <!-- Generator: Sketch 3.7.2 (28276) - http://www.bohemiancoding.com/sketch -->
										    <title>sidebar_fold</title>
										    <desc>Created with Sketch.</desc>
										    <defs></defs>
										    <g id="Home-page" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <g id="Sub-Page" transform="translate(-970.000000, -233.000000)" fill="#91222F">
										            <g id="sidebar" transform="translate(970.000000, 232.000000)">
										                <polygon id="sidebar_fold" points="31.4492188 0.9375 0.130661505 33.2574997 37.1620868 33.2574997"></polygon>
										            </g>
										        </g>
										    </g>
										</svg>
									</div>
									<div id="secondary" class="widget-area">
										test content
									</div>
								</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					
					<div class="postsHighlightSection">
						<div class="site-content-inner">
							
							Highlight posts
														
						</div>
					</div>
					
					
					<div class="calsFacesSection">
						<div class="site-content-inner">
							
							CALS FACES
														
						</div>
					</div>
					
					
					<div class="socialSection">
						<div class="site-content-inner">
							
							Social
														
						</div>
					</div>
					
					
					<div class="campaignSection">
						
							
							All Ways Forward
														
						
					</div>
	
				
				
				
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php get_footer(); ?>
