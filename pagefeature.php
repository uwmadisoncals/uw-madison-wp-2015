<?php 
				
	
				$mod = get_theme_mod( 'uw-madison-wp-2015_options_id' );
				
				if($mod != 0) {
				
				$the_query = new WP_Query( array( 'posts_per_page' => 1, 'page_id' => $mod ) ); ?>
				
				<?php if ( $the_query->have_posts() ) : ?>
				
					<!-- pagination here -->
				
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						
						<a href="<?php the_permalink(); ?>" class="featuredPage">
							<div class="rowalt">
								<?php if (has_post_thumbnail()) {
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    $bgImage = $thumb[0]; ?>

								
								<div class="span-50 featuredImageContainer">					<div class="featuredPageImage" style="background-image: url(<?php echo $bgImage ?>)">
																	</div>
								</div>
								
								<div class="span-50 featuredImageText">
									<div class="slice">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
	 viewBox="0 0 79.2 233.3" enable-background="new 0 0 79.2 233.3" xml:space="preserve" preserveAspectRatio="none">
<polygon points="0,0 79.2,0 79.2,233.3 "/>
</svg>

									</div>
									<h2><?php the_title(); ?></h2>
									<p><?php the_excerpt(); ?></p>
								</div>
								
							<?php } else { ?>
								
								
								<div class="span-100 featuredImageText">
									
									<h2><?php the_title(); ?></h2>
									<p><?php the_excerpt(); ?></p>
								</div>
							<?php } ?>
								
							</div>
						</a>
					<?php endwhile; ?>
					<!-- end of the loop -->
				
					<!-- pagination here -->
					
					<?php wp_reset_postdata(); ?>
				
				<?php else : ?>
					<!-- Don't show anything -->
				<?php endif; ?>
				
				<?php } ?>