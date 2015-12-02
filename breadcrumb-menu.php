<?php 
	
	//find all of the parents to the post
	$current_page_ancestors = get_post_ancestors($post);
	
	$tmp_post = $post;
	$reverted = new ArrayIterator(array_reverse($current_page_ancestors));
	
	if(sizeof($reverted) > 0){?>
		<div class="breadcrumb">
		<?php
		foreach ($reverted as $post){?>
			<div class="breadcrumb_item">
				<span class="nav_arrow"><?php include("images/arrow-right-thin.svg"); ?></span>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		<?php
		}
		$post = $tmp_post;
		?>
			<div class="breadcrumb_item">
				<span class="nav_arrow"><?php include("images/arrow-right-thin.svg"); ?></span>
				<span class="curr_page"><?php the_title(); ?></span>
			</div>
		</div>
	
	<?php
	}
		
	// Done. restore original $post
	$post = $tmp_post;
?>