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

		<?php

// get posts
$posts = get_posts(array(
	'post_type'			=> 'meeting',
	'posts_per_page'	=> -1,
	'meta_key'			=> 'meeting_date',
	'orderby'			=> 'meta_value',
	'order'				=> 'DESC'
));

if( $posts ): ?>

<header class="page-header">
        <h1 class="page-title">All Meetings</h1>
			</header><!-- .page-header -->

	<ul style="margin-left: 0px;">

	<?php foreach( $posts as $post ):

		setup_postdata( $post )

		?>
		<li style="list-style: none; margin-left: 0px; padding-left: 0px; margin-bottom: 1rem;">
			<a href="<?php the_permalink(); ?>" style="font-size: 1.5rem;"><?php the_title(); ?></a>
            <div><?php $date = new DateTime(get_field("meeting_date"));
echo $date->format('F j, Y'); ?> at <?php the_field('meeting_time'); ?></div>

		</li>

	<?php endforeach; ?>

	</ul>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .site-content-inner -->
<?php get_footer(); ?>
