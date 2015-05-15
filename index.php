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

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php include('spotlight.php'); ?>
			
			<div class="featuredPage">
				<?php
				
				
				
					$mod = get_theme_mod( 'uw-madison-wp-2015_options[page_feature]' );
					
						var_dump($mod);
				
				
				/*$args = array(
					'posts_per_page' => 1,
					'post_type' => 'page',
					'post__in' => $mod,
					'orderby' => 'post__in'
				);
				
				$query = new WP_Query( $args );
				
				if ( $query->have_posts() ) :
					$count = 1;
					while ( $query->have_posts() ) : $query->the_post();
					?>
				 
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-' . $count ); ?>>
				 
							<header class="entry-header">
								<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
							</header><!-- .entry-header -->
				 
							<div class="entry-summary clearfix">
								<?php the_excerpt(); ?>
							</div><!-- .entry-content -->
							<?php endif; ?>
				 
						</article><!-- #post-## -->
				 
					<?php
					$count++;
					endwhile;
				else :
					if ( current_user_can( 'customize' ) ) { ?>
						<div class="message">
							<p><?php _e( 'There are no pages available to display.', 'textdomain' ); ?></p>
							<p><?php printf(
								__( 'These pages can be set in the <a href="%s">customizer</a>.', 'textdomain' ),
								admin_url( 'customize.php?autofocus[control]=showcase' )
							); ?>
							</p>
						</div>
					<?php }
				endif; */
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
