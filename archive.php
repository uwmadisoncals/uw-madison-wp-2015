<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="cf pagePadding">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<ul>
			<?php while ( have_posts() ) : the_post(); ?>

				<li>
				<?php
					the_title( '<h2 class="entry-title">', '</h2>' );
					uw_madison_wp_2015_posted_on();
					the_excerpt();
				?>
				</li>

			<?php endwhile; ?>
			</ul>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
