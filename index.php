<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
