<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>
<div class="site-content-inner">

	<div id="primary" class="content-area <?php $image = get_field('hero_image_pages'); if($image) { echo "heroImage"; } ?>">
		<main id="main" class="site-main" role="main">
			<div class="cf pagePadding">
				<div class="docLoadBar"></div>
				<?php while ( have_posts() ) : the_post(); ?>
						

						
						<?php if(get_field('page_theme') == "documentation") { ?>
							<div class="documentationSideBar">
								<?php get_template_part('nav_menu', 'sidebar_expanded_docs'); ?>
								<?php wp_reset_query(); ?>
							</div>
						<?php } ?>

						<div class="documentationMain" id="docContent">
						
						<?php
							
							$editor = get_field('page_editor');
							$navhidden = get_field('hide_the_side_navigation');
							$showwidgets = get_field('show_page_widgets');
							
							if($editor == 'advanced') {  
								if(!$navhidden || $showwidgets) {
							?>
								
							   <div class="advancedPageEditorGroup apewithSidebar">
								   
								   <?php } else { ?>
								    <div class="advancedPageEditorGroup">
								   <?php } ?>
								<?php 
								// check if the flexible content field has rows of data
								if( have_rows('page_content_options') ) {
									
								 	// loop through the rows of data
								    while ( have_rows('page_content_options') ) : the_row();
								
										/********  CONTENT LAYOUTS   ********/
								
										// check current row layout
								        if( get_row_layout() == 'full_width' ) {
											
											
																						
											if( have_rows('full_width_content_options') ) {
												
												while ( have_rows('full_width_content_options') ) : the_row();
												
												
													
													
													
													 if( get_row_layout() == 'body_text' ) { ?>
														
														 <?php the_sub_field("text_content"); ?>
														 
													 <?php } else if( get_row_layout() == 'title_text' ) { ?>
														<header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("text_content"); ?></h1>
														</header>
														 
													 <?php } else if( get_row_layout() == 'button' ) { ?>
															<?php $buttonlink = get_sub_field("button_action"); 
																if($buttonlink == "page") { ?>
																	
																
																<a href="<?php the_sub_field("link_to_page"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } else { ?>
																<a href="<?php the_sub_field("button_link"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } ?>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														  
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum,'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														  <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
															?>
				
													 <?php }

												
													if( get_row_layout() == 'person_feature' ) {
														 
															 
															 ?>
															 
								    </div></div></main></div></div>
								    
								    
														 	
														 	<div class="personFeaturefw">
															 	<div class="site-content-inner">
															 	
															 	<div class="row">
																 	<div class="span-33">
																	 	<?php if(get_sub_field("person_photo")) {  ?>
																	 	
																	 		
																	<?php 
																		$personimage = get_sub_field('person_photo');
																		$size = 'medium'; // (thumbnail, medium, large, full or custom size)
																	
																		if( $personimage ) {
																		
																		 	$attachment_id = get_sub_field('person_photo'); $size = "medium"; 
																		 	$personimage = wp_get_attachment_image_src($attachment_id, $size); ?>
																		 	<div class="personphoto" style="background: url(<?php echo $personimage[0]; ?>) no-repeat; background-size: cover; background-position: center center;"></div>	
																		 <?php } ?>
																	 	
																		
																		
																		<?php } ?>
																		
																		<?php if(get_sub_field("quote")) {  ?>
																	 	
																		 <div class="personquote"><?php the_sub_field("quote"); ?></div>
																		
																		<?php } ?>
																 	</div>
																 	
																 	<div class="span-66">
																	 	<?php if(get_sub_field("section_title")) {  ?>
																	 	<header class="entry-header small-header">
																		 <h1 class="entry-title personsectiontitle"><?php the_sub_field("section_title"); ?></h1>
																		</header>
																		<?php } ?>
																		
																		<?php if(get_sub_field("persons_name")) {  ?>
																	 	
																		 <h2><?php the_sub_field("persons_name"); ?></h2>
																		
																		<?php } ?>
																		
																		<?php if(get_sub_field("person_bio")) {  ?>
																	 	
																		 <div class="bio"><?php the_sub_field("person_bio"); ?></div>
																		
																		<?php } ?>
																	
																 	</div>
															 	</div>
														 	</div> 
														 	</div>
														 	
				
								    
								    <div class="site-content-inner">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="cf pagePadding">
				<div class="advancedPageEditorGroup">
														 	
														<?php 
													}
													
												
													 $offsetC = get_sub_field('appearance_options'); 
													 
													 if( get_row_layout() == 'fw_highlighted_content' ) {
														 if(have_rows("fw_highlighted_content_type")) { ?>
														  <?php if($offsetC == '3col') { ?>
														  		<div class="gridthreecol gridstyle2">

																<div class="grid-sizer3col"></div>
															  <div class="gutter-sizer3col"></div>
														  	<?php } else { ?>
														 	<div class="gridtwocol gridstyle2">

																 <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															 <?php } ?>
															 	
	
															  
															  
															<?php if($offsetC == "offset") { ?>	  
			<div class="grid-item2col grid-itemspacer stamp"></div>		
			<?php } ?>

															

														 	<?php while ( have_rows('fw_highlighted_content_type') ) : the_row();
														  


																if(get_row_layout() == 'fw_latest_posts') {
																	if($offsetC == "3col") {
																		include 'page_editor_templates/fw_3col_latest_posts.php';
																	} else {
																		include 'page_editor_templates/fw_latest_posts.php';
																	}	
																}
																
																if(get_row_layout() == 'fw_posts_by_category') {
																	if($offsetC == "3col") {
																		include 'page_editor_templates/fw_3col_posts_by_category.php';
																	} else {
																		include 'page_editor_templates/fw_posts_by_category.php';
																	}
																	
																	
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	if($offsetC == "3col") {
																		include 'page_editor_templates/fw_3col_highlighted_page.php';
																	} else {
																		include 'page_editor_templates/fw_highlighted_page.php';
																	}
																	
																																
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														<?php }
														 
													 }
												endwhile;
												
											}
								        	
											/********  2 Columns   ********/
								        } else if( get_row_layout() == '2_column (50/50)' ) { ?>
											
											<div class="flex-row flex-<?php the_sub_field('column_sizes'); ?> left_<?php the_sub_field('left_column_style'); ?> right_<?php the_sub_field('right_column_style'); ?>">
												
											<?php if( have_rows('2c_5050_left_column') ) { ?>
													<div class="flex-item flex-leftCol">
												<?php while ( have_rows('2c_5050_left_column') ) : the_row();

												if( get_row_layout() == '2c_highlighted_content' ) {
														 if(have_rows("2c_highlighted_content_type")) { ?>
														
														 	<div class="gridonecol gridstyle2">
															 	
	
															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															  
															

															

														 	<?php while ( have_rows('2c_highlighted_content_type') ) : the_row();
														  


																if(get_row_layout() == 'fw_latest_posts') {
																	
																	include 'page_editor_templates/fw_latest_posts.php';
																		
																}
																
																if(get_row_layout() == '2c_post_by_category') {
																	
																	include 'page_editor_templates/2c_post_by_category.php';
																	
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	
																	include 'page_editor_templates/fw_highlighted_page.php';
																																
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														<?php }
														 
													 }
													
													
													 if( get_row_layout() == 'body_text' ) { ?>
														
														 <?php the_sub_field("text_content"); ?>
														 
													 <?php } else if( get_row_layout() == 'title_text' ) { ?>
														<header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1>
														</header>
														 
													 <?php } else if( get_row_layout() == 'button' ) { ?>
															<?php $buttonlink = get_sub_field("button_action"); 
																if($buttonlink == "page") { ?>
																	
																
																<a href="<?php the_sub_field("link_to_page"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } else { ?>
																<a href="<?php the_sub_field("button_link"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } ?>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														  
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum,'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														  <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
															?>
				
													 <?php }

												endwhile; ?>
													</div>
											<?php }
											
											if( have_rows('2c_5050_right_column') ) { ?>
													<div class="flex-item flex-rightCol">
														<div class="sidebarFold">
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
												<?php while ( have_rows('2c_5050_right_column') ) : the_row();

												if( get_row_layout() == '2c_highlighted_content' ) {
														 if(have_rows("2c_highlighted_content_type")) { ?>
														
														 	<div class="gridonecol gridstyle2">
															 	
	
															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															  
															

															

														 	<?php while ( have_rows('2c_highlighted_content_type') ) : the_row();
														  


																if(get_row_layout() == 'fw_latest_posts') {
																	
																	include 'page_editor_templates/fw_latest_posts.php';
																		
																}
																
																if(get_row_layout() == '2c_post_by_category') {
																	
																	include 'page_editor_templates/2c_post_by_category.php';
																	
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	
																	include 'page_editor_templates/fw_highlighted_page.php';
																																
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														<?php }
														 
													 }
													
													
													 if( get_row_layout() == 'body_text' ) {
														
														 the_sub_field("text_content");
														 
													 } else if( get_row_layout() == 'title_text' ) { ?>
														
														 <header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1> </header>
														 
													 <?php } else if( get_row_layout() == 'button' ) { ?>
															<?php $buttonlink = get_sub_field("button_action"); 
																if($buttonlink == "page") { ?>
																	
																
																<a href="<?php the_sub_field("link_to_page"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } else { ?>
																<a href="<?php the_sub_field("button_link"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } ?>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														
														 
														 
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum, 'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														
														 
														 <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
														 ?>

														 
													 <?php }
												endwhile; ?>
													</div>
											<?php } ?>
											
											
								        	
											</div>
								        	<?php 
											
											 /********  3 Columns   ********/
								        } else if( get_row_layout() == '3_column' ) { ?>
											
											<div class="flex-row flex-<?php the_sub_field('column_sizes'); ?> left_<?php the_sub_field('left_column_style'); ?> right_<?php the_sub_field('right_column_style'); ?>">
												
											<?php if( have_rows('3c_5050_left_column') ) { ?>
													<div class="flex-item flex-leftCol">
												<?php while ( have_rows('3c_5050_left_column') ) : the_row();


													if( get_row_layout() == '3c_highlighted_content' ) {
														 if(have_rows("3c_highlighted_content_type")) { ?>
														
														 	<div class="gridonecol gridstyle2">
															 	
	
															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															  
															

															

														 	<?php while ( have_rows('3c_highlighted_content_type') ) : the_row();
														  


																if(get_row_layout() == 'fw_latest_posts') {
																	
																	include 'page_editor_templates/fw_latest_posts.php';
																		
																}
																
																if(get_row_layout() == '3c_post_by_category') {
																	
																	include 'page_editor_templates/3c_post_by_category.php';
																	
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	
																	include 'page_editor_templates/fw_highlighted_page.php';
																																
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														<?php }
														 
													 }

													
													
													 if( get_row_layout() == 'body_text' ) { ?>
														
														 <?php the_sub_field("text_content"); ?>
														 
													 <?php } else if( get_row_layout() == 'title_text' ) { ?>
														<header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1>
														</header>
														 
													 <?php } else if( get_row_layout() == 'button' ) { ?>
															<?php $buttonlink = get_sub_field("button_action"); 
																if($buttonlink == "page") { ?>
																	
																
																<a href="<?php the_sub_field("link_to_page"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } else { ?>
																<a href="<?php the_sub_field("button_link"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } ?>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														  
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum,'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														  <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
															?>
				
													 <?php }

												endwhile; ?>
													</div>
											<?php }
												
												
											if( have_rows('3c_5050_middle_column') ) { ?>
													<div class="flex-item flex-rightCol">
														<div class="sidebarFold">
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
												<?php while ( have_rows('3c_5050_middle_column') ) : the_row();


												if( get_row_layout() == '3c_highlighted_content' ) {
														 if(have_rows("3c_highlighted_content_type")) { ?>
														
														 	<div class="gridonecol gridstyle2">
															 	
	
															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															  
															

															

														 	<?php while ( have_rows('3c_highlighted_content_type') ) : the_row();
														  


																if(get_row_layout() == 'fw_latest_posts') {
																	
																	include 'page_editor_templates/fw_latest_posts.php';
																		
																}
																
																if(get_row_layout() == '3c_post_by_category') {
																	
																	include 'page_editor_templates/3c_post_by_category.php';
																	
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	
																	include 'page_editor_templates/fw_highlighted_page.php';
																																
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														<?php }
														 
													 }
													
													
													 if( get_row_layout() == 'body_text' ) {
														
														 the_sub_field("text_content");
														 
													 } else if( get_row_layout() == 'title_text' ) { ?>
														
														 <header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1> </header>
														 
													 <?php } else if( get_row_layout() == 'button' ) { ?>
															<?php $buttonlink = get_sub_field("button_action"); 
																if($buttonlink == "page") { ?>
																	
																
																<a href="<?php the_sub_field("link_to_page"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } else { ?>
																<a href="<?php the_sub_field("button_link"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } ?>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														
														 
														 
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum, 'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														
														 
														 <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
														 ?>

														 
													 <?php }
												endwhile; ?>
													</div>
											<?php } 
											
											if( have_rows('3c_5050_right_column') ) { ?>
													<div class="flex-item flex-rightCol">
														<div class="sidebarFold">
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
												<?php while ( have_rows('3c_5050_right_column') ) : the_row();

												if( get_row_layout() == '3c_highlighted_content' ) {
														 if(have_rows("3c_highlighted_content_type")) { ?>
														
														 	<div class="gridonecol gridstyle2">
															 	
	
															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															  
															

															

														 	<?php while ( have_rows('3c_highlighted_content_type') ) : the_row();
														  


																if(get_row_layout() == 'fw_latest_posts') {
																	
																	include 'page_editor_templates/fw_latest_posts.php';
																		
																}
																
																if(get_row_layout() == '3c_post_by_category') {
																	
																	include 'page_editor_templates/3c_post_by_category.php';
																	
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	
																	include 'page_editor_templates/fw_highlighted_page.php';
																																
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														<?php }
														 
													 }
													
													
													 if( get_row_layout() == 'body_text' ) {
														
														 the_sub_field("text_content");
														 
													 } else if( get_row_layout() == 'title_text' ) { ?>
														
														 <header class="entry-header small-header">
														 <h1 class="entry-title"><?php the_sub_field("title_text_content"); ?></h1> </header>
														 
													 <?php } else if( get_row_layout() == 'button' ) { ?>
															<?php $buttonlink = get_sub_field("button_action"); 
																if($buttonlink == "page") { ?>
																	
																
																<a href="<?php the_sub_field("link_to_page"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } else { ?>
																<a href="<?php the_sub_field("button_link"); ?>" class="button blue"><?php the_sub_field("button_text"); ?></a>
															<?php } ?>
														 
													 <?php } else if( get_row_layout() == 'events' ) { ?>
														
														 
														 
														 <?php $eventsurl = get_sub_field("events_url");
															 	$eventsnum = get_sub_field("number_of_events");
															 	
															 uwmadison_events($eventsurl, array('limit' => $eventsnum, 'title' => 'Events', 'grouped' => TRUE)) ?>
														 
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														
														 
														 <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
														 ?>

														 
													 <?php }
												endwhile; ?>
													</div>
											<?php } ?>
											
											
								        	
											</div>
								        	<?php 
											
											} 
								
								    endwhile; ?>
								    
							   		</div>
									
								<?php } else { // no layouts found ?>
									<h1>You should add some content.</h1>
									
							   
							   <?php } //close off check for advanced editor ?>
							   
							   
							<?php } else { ?>
							
						
						<?php if(get_field('hero_image_pages')) { ?>
						<div class="heroWatermark">
							
							<?php 

							$image = get_field('hero_image_pages');
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							
							if( $image ) { ?>
							
								<?php echo wp_get_attachment_image( $image, $size ); ?>
							
								<div class="whiteBlend">
										<svg width="473px" height="285px" viewBox="0 0 473 285" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" preserveAspectRatio="none">
									    <title>blendwatermark</title>
									    <desc>Created with Sketch.</desc>
									    <defs>
									        <radialGradient cx="50%" cy="11.3342605%" fx="50%" fy="11.3342605%" r="82.2567483%" width="100%" id="radialGradient-1">
									            <stop stop-color="#FFFFFF" stop-opacity="0.7" offset="0%"></stop>
									            <stop stop-color="#FFFFFF" offset="100%"></stop>
									        </radialGradient>
									    </defs>
									    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
									        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-554.000000, -372.000000)" fill="url(#radialGradient-1)">
									            <rect id="blendwatermark" sketch:type="MSShapeGroup" x="554" y="372" width="473" height="285"></rect>
									        </g>
									    </g>
										</svg>
								</div>

							
							
							
							
								<?php } //completed check for editor type ?>
							</div>
							
							
						<?php } ?>
						<?php 
							
							$breadcrumb_settings = get_theme_mod( 'uw-madison-wp-2015_breadcrumbs_id' );
							
							
							if($breadcrumb_settings == "shown") {
								
								 get_template_part('breadcrumb', 'menu'); 
							}
						?>
					
						
				
					<?php get_template_part( 'content', 'page' ); ?>
					
					
					<?php } ?>
				</div>
				<?php endwhile; // end of the loop. ?>
								
				<?php 
					if ( !is_home() ) {
						if(get_field('page_theme') != "documentation") {
						if( !get_field('hide_the_side_navigation')) {
							$side_nav_settings = get_option( 'uw-madison-wp-2015_sidebar_options_id' );
	
							if($side_nav_settings == "simple-nav") {
								get_template_part('nav_menu', 'sidebar'); 
							} else {
								get_template_part('nav_menu', 'sidebar_expanded');
							}

					    }
					    
					    //$editor = get_field('page_editor');
						//if($editor == 'default') {

						    if( get_field('show_page_widgets')) {
						    	if ( is_active_sidebar( 'page-sidebar-1' ) ) : ?>
									<div class="sidebar_menu page-widget-sidebar">
										<?php dynamic_sidebar( 'page-sidebar-1' ); ?>
									</div>
								<?php endif;  
						    }
					    
					    //}
						}
					}	  
				?>
				
				
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .site-content-inner -->
<?php get_footer(); ?>
