
											<?php if(get_sub_field('row_background') == "color" || get_sub_field('row_background') == "image") { ?>
													
												

													<?php if(get_sub_field('row_background') == "color") { ?>
														<div style="background: <?php the_sub_field('row_background_color'); ?>">
													<?php } else { ?>
														
														<?php 

															$image = get_sub_field('row_background_image');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)

															if( $image ) { ?>
																<?php $bgposition = get_sub_field('row_background_image_position');
																		
																		
																		if($bgposition) {
																			if($bgposition == "fixed") {
																				$bgimagestyle = 'background-attachment: fixed; ';
																			} else {
																				$bgimagestyle = 'background-attachment: scroll; ';
																			}
																		} else {
																			$bgimagestyle = 'background-attachment: scroll; ';
																		}
																
																 ?>
																
																

															<div style="background: url(<?php echo wp_get_attachment_image_url( $image, $size ); ?>) no-repeat; background-size: cover; background-position: center center; <?php echo $bgimagestyle; ?>" >
															
															<?php }

															?>

														
													<?php } ?>

													

							   										

											<?php } ?>


											 <?php $rowspacingtop = get_sub_field('row_spacing_top'); 
																 	
																 	   if($rowspacingtop == true) {
																			$rowspacingtopclass = "removetoppadding";
																		} else {
																			$rowspacingtopclass = "";
																		}
																 ?>

																  <?php $rowspacingbottom = get_sub_field('row_spacing_bottom'); 
																 	
																 	   if($rowspacingbottom == true) {
																			$rowspacingbottomclass = "removebottompadding";
																		} else {
																			$rowspacingbottomclass = "";
																		}
																 ?>


																  <?php $rowwidthlimit = get_sub_field('row_width_limit'); 
																 	
																 	   if($rowwidthlimit == true) {
																			$rowwidthlimitclass = "removewidthlimit";
																		} else {
																			$rowwidthlimitclass = "";
																		}
																 ?>
																						
											<?php if( have_rows('full_width_content_options') ) { ?>
												

												

												<div class="flex-row-wrapper <?php echo $rowspacingtopclass ?> <?php echo $rowspacingbottomclass ?> <?php echo $rowwidthlimitclass ?>">
												<?php while ( have_rows('full_width_content_options') ) : the_row(); ?>
												
												
													<?php if( get_row_layout() == 'accordion_panel' ) { ?>
													
														<?php include 'accordion.php'; ?>
														 
														 
													 <?php } else if( get_row_layout() == 'body_text' ) { ?>
														
														 <?php the_sub_field("text_content"); ?>
														 
													 <?php } else if( get_row_layout() == 'title_text' ) { ?>
														<header class="entry-header small-header">
														 <h1 class="entry-title <?php the_sub_field('heading_size'); ?>"><?php the_sub_field("text_content"); ?></h1>
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

													<?php } else if( get_row_layout() == 'fund_raising' ) { ?>
														  		<?php include 'fundraising.php'; ?>
															
													<?php } else if( get_row_layout() == 'social' ) { ?>
														  
																<?php include 'social.php'; ?>
													 <?php } else if( get_row_layout() == 'photo' ) { ?>
														
														  <?php 

															$image = get_sub_field('photo_from_library');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)
															
															if( $image ) {
															
																echo wp_get_attachment_image( $image, $size );
															
															}
															
															?>
				
													 <?php }


													 if( get_row_layout() == 'remote_wp_content' ) {
													include 'wp_remote_content.php';	

												 }

												
													if( get_row_layout() == 'person_feature' ) {
														 
															 
															 ?>
															 
								    
								    
								    
														 	
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
																		include 'fw_3col_latest_posts.php';
																	} else {
																		include 'fw_latest_posts.php';
																	}	
																}
																
																if(get_row_layout() == 'fw_posts_by_category') {
																	if($offsetC == "3col") {
																		include 'fw_3col_posts_by_category.php';
																	} else {
																		include 'fw_posts_by_category.php';
																	}
																	
																	
																}
																
																if(get_row_layout() == 'fw_highlighted_page') {
																	if($offsetC == "3col") {
																		include 'fw_3col_highlighted_page.php';
																	} else {
																		
																		include 'fw_highlighted_page.php';
																	}
																	
																																
																	
																}


																if(get_row_layout() == 'remote_posts') {
																	
																	if($offsetC == "3col") {
																		
																		include 'highlighted_remote_posts_3col.php';
																	} else {
																		
																		include 'highlighted_remote_posts.php';
																	}
																	
																																
																	
																}
															
														    endwhile; ?>
														    
														 	</div>	 
														

														
														<?php }
														 
													 } ?>
													 
												<?php endwhile; ?>
												</div> <!-- closing flex-row-wrapper -->
											<?php } ?>
								        	<?php if(get_sub_field('row_background') == "color" || get_sub_field('row_background') == "image") { ?></div> <?php } ?>