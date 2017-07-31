<?php
/**
 * The template for displaying search results pages.
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>

<?php $gcse = get_theme_mod("uw-madison-wp-2015_gcse_id"); ?>
<div class="site-content-inner">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="cf pagePadding">


			<header class="entry-header centered-header">
				<h1 class="entry-title">CALS Search</h1>
			</header>
<?php if($gcse != "") { ?>
			<gcse:searchbox queryParameterName="s"></gcse:searchbox>
<?php } ?>
			<div class="row">
				<div class="span-66">
		<?php if($gcse != "") { ?>
			

			
			<gcse:searchresults></gcse:searchresults>
		<?php } else { ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'uw-madison-wp-2015' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<?php } ?>
				</div>
				<div class="span-33 cardSidebar ">
					

					<div class="sidebar_menu">
						<h1>Directory Matches</h1>
						<div id="cals_uwds_search_results"></div>
					</div>
				</div>

			</div>
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->
</div>
<?php get_footer(); ?>
