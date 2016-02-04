<?php if (is_front_page()){ ?>
<section class="spotlight left-sidebar cf">
	<h1><span class="screen-reader-text">Check out the latest news and articles.</span></h1>
	
	
	
	
	<div class="row toppadding">
	
		
	
	<?php $args = array( 
           'post__not_in' => get_option( 'sticky_posts' ), 
           'posts_per_page' => 3, 
        ); 
		query_posts($args); ?>
	<ul class="spotlightList cf">
	<?php while (have_posts()) : the_post(); ?>
		<li class="span-33 cf">
			<div class="spotlightImage box">
				<?php if ( has_post_thumbnail() ) { ?>
					  <?php the_post_thumbnail('thumbnail'); ?>
				<?php } 
					else{ ?>
						<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
					<?php }
				?>
			</div>
			<div class="spotlightText">
				<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="spotlightDate"><?php the_date(); ?></div>
			    <?php the_excerpt(); ?>
			</div>
		</li>
        <?php endwhile; ?>
		<?php wp_reset_query(); ?>
		
	</ul>
	
	</div>
	<div class="sidebarWrapper"><?php get_sidebar(); ?></div>
	
</section>

<?php } else { ?>
<section class="spotlight_list">
	<h1><span class="screen-reader-text">Check out the latest news and articles.</span></h1>
	
	<div class="row toppadding">
	
	<ul class="spotlightList">
	<?php while (have_posts()) : the_post(); ?>
		<li class="row">
			<div class="spotlightImage box span-25">
				<?php if ( has_post_thumbnail() ) { ?>
					  <?php the_post_thumbnail('thumbnail'); ?>
				<?php } 
					else{ ?>
						<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
					<?php }
				?>
			</div>
			<div class="blog_details span-66">
				<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="date"><span class="screen-reader-text">Posted on </span><?php the_date(); ?> </div>
				<?php the_excerpt(); ?>
			</div>
		</li>
        <?php endwhile; ?>
		<?php wp_reset_query(); ?>
		
	</ul>
	<div class="postsNavigation">
	<?php the_posts_navigation(); ?>
</div>
	
	
</section>
	
<?php } ?>