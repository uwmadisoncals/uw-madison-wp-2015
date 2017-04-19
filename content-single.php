<?php
/**
 * @package UW Madison WP 2015
 */
?>
<?php $postedbylocation = get_theme_mod('uw-madison-wp-2015_postedby_id'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  	the_post_thumbnail('large'); ?>
			  	<div class="featured_title">
				  	<?php if(get_field("sub_title")) { ?>
				  			<h2 class="entrySubTitle"><?php the_field("sub_title"); ?></h2>
				  	<?php } ?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
					<div class="entry-meta">
				
						
						<?php
							if(get_field('written_by')) { 
								
								echo '<div class="byline" style="display: block; margin-top: 0.5rem;"> By ';
								the_field('written_by');
								echo '</div>';
							} else {
								//uw_madison_wp_2015_posted_on();
							} ?>

						
							<?php if($postedbylocation != "lower") {
								uw_madison_wp_2015_posted_on();
							} else { ?>
								<div class="posted-on"><?php the_date(); ?></div>

							
							<?php	}  ?>
						
					</div><!-- .entry-meta -->
				</div>
		<?php	} else { ?>
					<?php if(get_field("sub_title")) { ?>
				  			<h2 class="entrySubTitle"><?php the_field("sub_title"); ?></h2>
				  	<?php } ?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	
					<div class="entry-meta">
						<?php 
							if(get_field('written_by')) { 
								
								echo '<div class="byline" style="display: block; margin-top: 0.5rem;"> By ';
								the_field('written_by');
								echo '</div>';
							} else {
								//uw_madison_wp_2015_posted_on();
							} ?>
							<?php if($postedbylocation != "lower") {
								uw_madison_wp_2015_posted_on();
							} else { ?>
								<div class="posted-on"><?php the_date(); ?></div>

						<?php	} ?>
					</div><!-- .entry-meta -->
			
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php if($postedbylocation == "lower") {
			//uw_madison_wp_2015_posted_on();
		


		
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'uw-madison-wp-2015' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'uw-madison-wp-2015' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'uw-madison-wp-2015' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'uw-madison-wp-2015' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'uw-madison-wp-2015' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		

		}  ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'uw-madison-wp-2015' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
