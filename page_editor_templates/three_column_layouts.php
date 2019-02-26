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

															<div style="background: url(<?php echo wp_get_attachment_image_url( $image, $size ); ?>) no-repeat; background-size: cover; background-position: center center; <?php echo $bgimagestyle; ?>">

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

												<div class="flex-row-wrapper <?php echo $rowspacingtopclass ?> <?php echo $rowspacingbottomclass ?>">
											<?php  ?>
											<div class="flex-row flex-<?php the_sub_field('column_sizes'); ?> left_<?php the_sub_field('left_column_style'); ?> right_<?php the_sub_field('right_column_style'); ?>">

											<?php if( have_rows('3c_5050_left_column') ) { ?>
													<div class="flex-item flex-leftCol">
												<?php while ( have_rows('3c_5050_left_column') ) : the_row();
													$columnstyle = "";
													$columnstyle = get_sub_field('highlighted_content_style');

													$overrideimage = "";
													$overrideimage = get_sub_field('override_image');


													if( get_row_layout() == 'remote_wp_content' ) {
													include 'wp_remote_content.php';

												 }

												 if( get_row_layout() == 'interactive_card' ) {
													include 'interactive_card.php';

												 }

												 if( get_row_layout() == 'periodic_table' ) {
													include 'periodic_table.php';

												 }

													if( get_row_layout() == '3c_highlighted_content' ) {
														$styleoptions = get_sub_field('style_options');
														$datevisible = get_sub_field("hide_date");
														$authorvisible = get_sub_field("hide_author");

														 if(have_rows("3c_highlighted_content_type")) { ?>

														 	<div class="gridonecol gridstyle2 <?php echo $styleoptions; ?> <?php echo $columnstyle ?>">


															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>





														 	<?php while ( have_rows('3c_highlighted_content_type') ) : the_row();



																if(get_row_layout() == '3c_latest_posts') {

																	include '3c_latest_posts.php';

																}

																if(get_row_layout() == '3c_post_by_category') {

																	include '3c_post_by_category.php';

																}

																if(get_row_layout() == '3c_highlighted_page') {

																	include '3c_highlighted_page.php';


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
												$columnstyle = "";
												$columnstyle = get_sub_field('highlighted_content_style');

												$overrideimage = "";
													$overrideimage = get_sub_field('override_image');


												if( get_row_layout() == 'remote_wp_content' ) {
													include 'wp_remote_content.php';

												 }

												 if( get_row_layout() == 'interactive_card' ) {
													include 'interactive_card.php';

												 }

												 if( get_row_layout() == 'periodic_table' ) {
													include 'periodic_table.php';

												 }

												 if( get_row_layout() == '3c_highlighted_content' ) {
													$styleoptions = get_sub_field('style_options');
													$datevisible = get_sub_field("hide_date");
													$authorvisible = get_sub_field("hide_author");

													 if(have_rows("3c_highlighted_content_type")) { ?>

														 <div class="gridonecol gridstyle2 <?php echo $styleoptions; ?> <?php echo $columnstyle ?>">


															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>





														 	<?php while ( have_rows('3c_highlighted_content_type') ) : the_row();



																if(get_row_layout() == '3c_latest_posts') {

																	include '3c_latest_posts.php';

																}

																if(get_row_layout() == '3c_post_by_category') {

																	include '3c_post_by_category.php';

																}

																if(get_row_layout() == '3c_highlighted_page') {

																	include '3c_highlighted_page.php';


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
												$columnstyle = "";
												$columnstyle = get_sub_field('highlighted_content_style');

												$overrideimage = "";
													$overrideimage = get_sub_field('override_image');

												if( get_row_layout() == 'remote_wp_content' ) {
													include 'wp_remote_content.php';

												 }

												 if( get_row_layout() == 'interactive_card' ) {
													include 'interactive_card.php';

												 }

												 if( get_row_layout() == 'periodic_table' ) {
													include 'periodic_table.php';

												 }

												 if( get_row_layout() == '3c_highlighted_content' ) {
													$styleoptions = get_sub_field('style_options');
													$datevisible = get_sub_field("hide_date");
													$authorvisible = get_sub_field("hide_author");

													 if(have_rows("3c_highlighted_content_type")) { ?>

														 <div class="gridonecol gridstyle2 <?php echo $styleoptions; ?> <?php echo $columnstyle ?>">


															  <div class="grid-sizer2col"></div>
															  <div class="gutter-sizer2col"></div>





														 	<?php while ( have_rows('3c_highlighted_content_type') ) : the_row();



																if(get_row_layout() == '3c_latest_posts') {

																	include '3c_latest_posts.php';

																}

																if(get_row_layout() == '3c_post_by_category') {

																	include '3c_post_by_category.php';

																}

																if(get_row_layout() == '3c_highlighted_page') {

																	include '3c_highlighted_page.php';


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
											</div>
											<?php if(get_sub_field('row_background') == "color" || get_sub_field('row_background') == "image") { ?></div> <?php } ?>