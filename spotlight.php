<section class="spotlight">
	<h1><span class="screen-reader-text">Check out the latest news and articles.</span></h1>
	
	<div class="row toppadding">
	<?php query_posts('showposts=3'); ?>
	<ul>
	<?php while (have_posts()) : the_post(); ?>
		<li class="span-33">
			<div class="spotlightImage">
				<?php if ( has_post_thumbnail() ) { ?>
					  <?php the_post_thumbnail('thumbnail'); ?>
				<?php } 
					else{ ?>
						<img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.png">
					<?php }
				?>
			</div>
			<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		    <?php the_excerpt(); ?>
		</li>
        <?php endwhile; ?>
		<?php wp_reset_query(); ?>
		
	</ul>
	
</section>