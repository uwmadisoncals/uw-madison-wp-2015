<?php //Directory Listing Include

$listingoptions = get_sub_field('listing_options');

if($listingoptions == "listall") { ?>

    <?php $args = array( 'post_type' => 'directory', 'posts_per_page' => -1 ); 
    $loop = new WP_Query( $args ); ?>
    <ul class="directoryListing">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php include 'directory_listing_content.php'; ?>
    
    <?php endwhile; ?>
    </ul>

    <?php wp_reset_postdata(); ?>

<?php } else if($listingoptions == "listgroups") { ?>

    <?php $args = array( 'post_type' => 'directory', 'posts_per_page' => -1 ); 
    $loop = new WP_Query( $args ); ?>
    <ul class="directoryListing">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php include 'directory_listing_content.php'; ?>
    
    <?php endwhile; ?>
    </ul>

    <?php wp_reset_postdata(); ?>

<?php } else if($listingoptions == "listindividual") { ?>

    <?php $args = array( 'post_type' => 'directory', 'posts_per_page' => -1 ); 
    $loop = new WP_Query( $args ); ?>
    <ul class="directoryListing">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php include 'directory_listing_content.php'; ?>
    
    <?php endwhile; ?>
    </ul>

    <?php wp_reset_postdata(); ?>

<?php } ?>