<?php 
/** Outputs a full page navigation menu 
*/
?>
<?php
	
	$tmp_post = $post;
	
	//Find parent
	$current_id = get_the_ID();
	$parent = array_reverse(get_post_ancestors($post->ID));
	$first_parent = get_page($parent[0]);
	
	//get children of current page
	$child_pages = get_pages('child_of='.$first_parent->ID.'&parent='.$first_parent->ID.'&hierarchical=0&post_type=page&sort_column=menu_order&sort_order=ASC');
	
	if(!empty($child_pages)){?>
		<ul id="nav_explore">
		<?php
        foreach($child_pages as $post){
        	setup_postdata($post);?>
        	<?php if ($current_id == $post->ID) { ?>
       			<li class="selected_page_item page_item page-item-<?php the_ID();?>">
       		<?php } else { ?>
       			<li class="page_item page-item-<?php the_ID();?>">
            <?php } //end if ?>
            		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
        <?php } ?>
        </ul><!-- #nav_explore -->    
	<?php 
	}


	// Done. restore original $post
	$post = $tmp_post;



	?>



	
