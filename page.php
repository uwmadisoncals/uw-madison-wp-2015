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

	<div class="featureHeader">
		<?php if(is_home()) { ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
						  $url = $thumb['0']; ?>
					<div class="heroImage" style="background: url(<?php echo $url ?>);"></div>
				<?php } else { ?>
					<div class="heroImage heroImageDefault"></div>
				<?php } ?>
		<?php } ?>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
