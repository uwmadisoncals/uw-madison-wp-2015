<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>
<div class="site-content-inner">
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
			<ul class="archived_items">
			<?php while ( have_posts() ) : the_post(); ?>

				<li class="row">
					<span class="date span-15"><span class="screen-reader-text">Posted on </span><?php the_date(); ?> </span>
					<div class="span-75">
						<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
						<?php the_excerpt(); ?>
					</div>
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
</div><!-- .site-content-inner -->
<?php get_footer(); ?>
