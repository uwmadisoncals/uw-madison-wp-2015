<?php 
	
$post_object1 = get_field('featured_page_1');
$post_object2 = get_field('featured_page_2');
$post_object3 = get_field('featured_page_3');
$post_object4 = get_field('featured_page_4');
$post_object5 = get_field('featured_page_5');
$post_object6 = get_field('featured_page_6');

?>



<section class="spotlight removePadding">
	<h1><span class="screen-reader-text">Check out the latest news and articles.</span></h1>
	
	<div class="row toppadding">
	
	<ul class="spotlightList">
	<?php if( $post_object1 ) { 
		
		// override $post
		$post = $post_object1;
		setup_postdata( $post ); 
	?>
		<li class="span-33">
			<div class="spotlightImage box">
				<?php if ( has_post_thumbnail() ) { ?>
					  <a href="<?php the_permalink(); ?>" style="background: url('<?php $pstthumb = get_the_post_thumbnail_url( $post, 'medium' ); echo $pstthumb; ?>') no-repeat; background-size: cover; background-position: center center;"><?php the_title(); ?></a>
				<?php } 
					else{ ?>
						<a href="<?php the_permalink(); ?>"><img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg"></a>
					<?php }
				?>
			</div>
			<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		    <?php the_excerpt(); ?>
		</li>
       <?php wp_reset_postdata(); 
	        } ?>
	       
	       
	       
	        
	    <?php if( $post_object2 ) { 
		
		// override $post
		$post = $post_object2;
		setup_postdata( $post ); 
	?>
		<li class="span-33">
			<div class="spotlightImage box">
				<?php if ( has_post_thumbnail() ) { ?>
					  <a href="<?php the_permalink(); ?>" style="background: url('<?php $pstthumb = get_the_post_thumbnail_url( $post, 'medium' ); echo $pstthumb; ?>') no-repeat; background-size: cover; background-position: center center;"><?php the_title(); ?></a>
				<?php } 
					else{ ?>
						<a href="<?php the_permalink(); ?>"><img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg"></a>
					<?php }
				?>
			</div>
			<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		    <?php the_excerpt(); ?>
		</li>
       <?php wp_reset_postdata(); 
	        } ?>
	        
	     <?php if( $post_object3 ) { 
		
		// override $post
		$post = $post_object3;
		setup_postdata( $post ); 
	?>
		<li class="span-33">
			<div class="spotlightImage box">
				<?php if ( has_post_thumbnail() ) { echo has_post_thumbnail(); ?>
					  <a href="<?php the_permalink(); ?>" style="background: url('<?php $pstthumb = get_the_post_thumbnail_url( $post, 'medium' ); echo $pstthumb; ?>') no-repeat; background-size: cover; background-position: center center;"><?php the_title(); ?></a>
				<?php } 
					else{ ?>
						<a href="<?php the_permalink(); ?>"><img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg"></a>
					<?php }
				?>
			</div>
			<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		    <?php the_excerpt(); ?>
		</li>
       <?php wp_reset_postdata(); 
	        } ?>
	        
	        
	      <?php if( $post_object4 ) { 
		
		// override $post
		$post = $post_object4;
		setup_postdata( $post ); 
	?>
		<li class="span-33">
			<div class="spotlightImage box">
				<?php if ( has_post_thumbnail() ) { ?>
					  <a href="<?php the_permalink(); ?>" style="background: url('<?php $pstthumb = get_the_post_thumbnail_url( $post, 'medium' ); echo $pstthumb; ?>') no-repeat; background-size: cover; background-position: center center;"><?php the_title(); ?></a>
				<?php } 
					else{ ?>
						<a href="<?php the_permalink(); ?>"><img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg"></a>
					<?php }
				?>
			</div>
			<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		    <?php the_excerpt(); ?>
		</li>
       <?php wp_reset_postdata(); 
	        } ?>
	        
	        
	     <?php if( $post_object5 ) { 
		
		// override $post
		$post = $post_object5;
		setup_postdata( $post ); 
	?>
		<li class="span-33">
			<div class="spotlightImage box">
				<?php if ( has_post_thumbnail() ) { ?>
					  <a href="<?php the_permalink(); ?>" style="background: url('<?php $pstthumb = get_the_post_thumbnail_url( $post, 'medium' ); echo $pstthumb; ?>') no-repeat; background-size: cover; background-position: center center;"><?php the_title(); ?></a>
				<?php } 
					else{ ?>
						<a href="<?php the_permalink(); ?>"><img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg"></a>
					<?php }
				?>
			</div>
			<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		    <?php the_excerpt(); ?>
		</li>
       <?php wp_reset_postdata(); 
	        } ?>
	        
	        
	      <?php if( $post_object6 ) { 
		
		// override $post
		$post = $post_object6;
		setup_postdata( $post ); 
	?>
		<li class="span-33">
			<div class="spotlightImage box">
				<?php if ( has_post_thumbnail() ) { ?>
					  <a href="<?php the_permalink(); ?>" style="background: url('<?php $pstthumb = get_the_post_thumbnail_url( $post, 'medium' ); echo $pstthumb; ?>') no-repeat; background-size: cover; background-position: center center;"><?php the_title(); ?></a>
				<?php } 
					else{ ?>
						<a href="<?php the_permalink(); ?>"><img alt=" " src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg"></a>
					<?php }
				?>
			</div>
			<h2 class="home link "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		    <?php the_excerpt(); ?>
		</li>
       <?php wp_reset_postdata(); 
	        } ?>
		
	</ul>
	
</section>
