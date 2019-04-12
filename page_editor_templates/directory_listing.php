<?php //Directory Listing Include

$directorylayout = get_sub_field('directory_layout');
$gridlayoutoptions = get_sub_field('grid_options');
$listingoptions = get_sub_field('listing_options');
$directoryfilter = get_sub_field('listing_filter');

$hide_photos = get_sub_field('hide_profile_photos');

    if($hide_photos) {
        $hide_photos_css = "hiddenPhotos";
    } else {
        $hide_photos_css = "";
    }

if($listingoptions == "listbygroups") {
    $directoryinput = "directorygroups";
    $directoryplaceholder = "Filter Directory Groups";
} else {
    $directoryinput = "directorys";
    $directoryplaceholder = "Filter Directory";
}
 ?>

<div class="directoryWrapper <?php echo $directorylayout; ?> <?php echo $gridlayoutoptions ?>">

<?php if($directoryfilter) { ?>
    <div class="directoryFilter">
        <div class="searchIcon"><svg height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#929292" id="icon-111-search"><path d="M19.4271164,21.4271164 C18.0372495,22.4174803 16.3366522,23 14.5,23 C9.80557939,23 6,19.1944206 6,14.5 C6,9.80557939 9.80557939,6 14.5,6 C19.1944206,6 23,9.80557939 23,14.5 C23,16.3366522 22.4174803,18.0372495 21.4271164,19.4271164 L27.0119176,25.0119176 C27.5621186,25.5621186 27.5575313,26.4424687 27.0117185,26.9882815 L26.9882815,27.0117185 C26.4438648,27.5561352 25.5576204,27.5576204 25.0119176,27.0119176 L19.4271164,21.4271164 L19.4271164,21.4271164 Z M14.5,21 C18.0898511,21 21,18.0898511 21,14.5 C21,10.9101489 18.0898511,8 14.5,8 C10.9101489,8 8,10.9101489 8,14.5 C8,18.0898511 10.9101489,21 14.5,21 L14.5,21 Z" id="search"/></g></g></svg></div>
        <div class="searchField"><input type="text" class="<?php echo $directoryinput ?>" placeholder="<?php echo $directoryplaceholder ?>"></div>

    </div>
<?php }

if($listingoptions == "listall") { ?>

    <?php $args = array( 'post_type' => 'directory', 'posts_per_page' => -1, 'meta_key'	=> 'last_name',
	        'orderby' => 'meta_value',
	        'order'	=> 'ASC', );
    $loop = new WP_Query( $args ); ?>
    <ul class="directoryListing <?php echo $hide_photos_css; ?>">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php include 'directory_listing_content.php'; ?>

    <?php endwhile; ?>
    </ul>

    <?php wp_reset_postdata(); ?>

<?php } else if($listingoptions == "listgroups") { ?>




    <?php

$terms = get_sub_field('groups_to_list');
$directoryterms = array();


if( $terms ): ?>



	<?php foreach( $terms as $term ): ?>

		 <?php array_push($directoryterms, $term); ?>

	<?php endforeach; ?>


    <?php $args = array( 'post_type' => 'directory',
            'posts_per_page' => -1,
            'meta_key'	=> 'last_name',
	        'orderby' => 'meta_value',
	        'order'	=> 'ASC',
            'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'group',
                'field' => 'term_id',
                'terms' => $directoryterms
            )
        ) );
    $loop = new WP_Query( $args ); ?>
    <ul class="directoryListing <?php echo $hide_photos_css; ?>">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php include 'directory_listing_content.php'; ?>

    <?php endwhile; ?>
    </ul>

    <?php wp_reset_postdata(); ?>


<?php endif; ?>



<?php } else if($listingoptions == "listindividual") { ?>


    <?php



    $post_objects = get_sub_field('individuals_to_list');


    if( $post_objects ): ?>
        <ul class="directoryListing <?php echo $hide_photos_css; ?>">
        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <?php include 'directory_listing_content.php'; ?>
        <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>



<?php } else if($listingoptions == "listbygroups") { ?>
<div class="accordion_wrapper">

   <?php  $custom_terms = get_terms('group');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'directory',
        'tax_query' => array(
            array(
                'taxonomy' => 'group',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
    if($loop->have_posts()) { ?>
        <div class="accordion_row">
            <a href="#" class="accordion_title"><span class="symbol">+</span><?php echo $custom_term->name; ?></a>


        <div class="accordion_content">
        <ul class="directoryListing <?php echo $hide_photos_css; ?>">
        <?php while($loop->have_posts()) : $loop->the_post(); ?>
            <?php include 'directory_listing_content.php'; ?>
        <?php endwhile; ?>
        </ul>
        </div>
        </div>
    <?php }
} ?>
<?php wp_reset_postdata(); ?>
</div>

<?php } ?>

</div>