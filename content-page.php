<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package UW Madison WP 2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	
	<header class="entry-header">
		<?php
			if ( has_post_thumbnail() && !get_field('hide_featured_image') ) { // check if the post has a Post Thumbnail assigned to it.

				

			  		the_post_thumbnail('large');  ?>
			  	
			  	<div class="featured_title">
				  	<?php if(get_field("sub_title")) { ?>
				  			<h2 class="entrySubTitle"><?php the_field("sub_title"); ?></h2>
				  	<?php } ?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
		<?php	} else { ?>
					<?php if(get_field("sub_title")) { ?>
				  			<h2 class="entrySubTitle"><?php the_field("sub_title"); ?></h2>
				  	<?php } ?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
				<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php if( get_field('tag') ): ?>
			<?php 
				uwmadison_events('http://today.wisc.edu/events/tag/'.rawurlencode(get_field('tag')) , array('limit' => get_field('limit'))); 
			?>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'uw-madison-wp-2015' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
