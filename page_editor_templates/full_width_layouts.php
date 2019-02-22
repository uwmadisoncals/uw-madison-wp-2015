
											<?php if(get_sub_field('row_background') == "color" || get_sub_field('row_background') == "image") { ?>



													<?php if(get_sub_field('row_background') == "color") { ?>
														<div style="background: <?php the_sub_field('row_background_color'); ?>">
													<?php } else { ?>

														<?php
															$imageposition = get_sub_field('row_background_image_verticalpos');
															$image = get_sub_field('row_background_image');
															$size = 'large'; // (thumbnail, medium, large, full or custom size)

															if(!$imageposition) {
																$imageposition = "center";
															}

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



															<div style="background: url(<?php echo wp_get_attachment_image_url( $image, $size ); ?>) no-repeat; background-size: cover; background-position: <?php echo $imageposition; ?> center; <?php echo $bgimagestyle; ?>" >

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

												<?php if( get_row_layout() == 'display_posts' ) { ?>

														<?php include 'list_posts.php'; ?>

													<?php } else if( get_row_layout() == 'accordion_panel' ) { ?>

														<?php include 'accordion.php'; ?>



													<?php } else if( get_row_layout() == 'image_carousel' ) { ?>



														<?php include 'imageslider.php'; ?>


													 <?php } else if( get_row_layout() == 'embed_page') { ?>

													 	<?php include 'template_embed.php'; ?>


													 <?php } else if( get_row_layout() == 'download_table' ) { ?>



														<?php include 'download_table.php'; ?>



														<?php } else if( get_row_layout() == 'body_text' ) { ?>

														<?php if(get_sub_field('content_filter') == "1") {  ?>
															<div class="contentFilterWrapper">
																<div class="contentFilter">
																	<div class="searchIcon"><svg height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#929292" id="icon-111-search"><path d="M19.4271164,21.4271164 C18.0372495,22.4174803 16.3366522,23 14.5,23 C9.80557939,23 6,19.1944206 6,14.5 C6,9.80557939 9.80557939,6 14.5,6 C19.1944206,6 23,9.80557939 23,14.5 C23,16.3366522 22.4174803,18.0372495 21.4271164,19.4271164 L27.0119176,25.0119176 C27.5621186,25.5621186 27.5575313,26.4424687 27.0117185,26.9882815 L26.9882815,27.0117185 C26.4438648,27.5561352 25.5576204,27.5576204 25.0119176,27.0119176 L19.4271164,21.4271164 L19.4271164,21.4271164 Z M14.5,21 C18.0898511,21 21,18.0898511 21,14.5 C21,10.9101489 18.0898511,8 14.5,8 C10.9101489,8 8,10.9101489 8,14.5 C8,18.0898511 10.9101489,21 14.5,21 L14.5,21 Z" id="search"/></g></g></svg></div>
																	<div class="searchField"><label class="screen-reader-text" for="contentfilters">Filter the Content</label><input type="text" id="contentfilters" class="contentfilters" placeholder="Filter"></div>

																</div>
																<div class="contentListing">
																	<?php the_sub_field("text_content"); ?>
																</div>
															</div>
														<?php } else { ?>

														 <?php the_sub_field("text_content"); ?>

														 <?php } ?>

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


													 if( get_row_layout() == 'directory_listing' ) {
													include 'directory_listing.php';

												 }

												 if( get_row_layout() == 'remote_wp_content' ) {
													include 'wp_remote_content.php';

												 }

												 if( get_row_layout() == 'periodic_table' ) {
													include 'periodic_table.php';

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

																		 <div class="personquote"><span>“</span><div class="mainquote"><?php the_sub_field("quote"); ?></div></div>

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
													 $styleoptions = get_sub_field('style_options');
													  $datevisible = get_sub_field("hide_date");

													 if( get_row_layout() == 'fw_highlighted_content' ) {
														 if(have_rows("fw_highlighted_content_type")) { ?>



														  <?php if($offsetC == '3col') { ?>
														  		<div class="gridthreecol gridstyle2 <?php echo $styleoptions; ?>">

																<div class="grid-sizer3col"></div>
															  <div class="gutter-sizer3col"></div>
														  	<?php } else { ?>
														 	<div class="gridtwocol gridstyle2 <?php echo $styleoptions; ?>">

																 <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>
															 <?php } ?>




															<?php if($offsetC == "offset") { ?>
			<div class="grid-item2col grid-itemspacer stamp <?php echo $styleoptions; ?>"></div>
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