<?php
/**
 * @package UW Madison WP 2015
 */
?>
<?php $postedbylocation = get_theme_mod('uw-madison-wp-2015_postedby_id'); ?>
<article class="directory" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">



					<h1 class="entry-title"><?php the_title();?></h1>
					<h2 class="entrySubTitle"><?php the_field('meeting_time'); ?></h2>




	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="singleDirectoryWrapper">
			<div class="singleDirectoryInfo">
				<div class="phone"><?php the_field('location'); ?></div>
				<div><a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></div>
				<p><?php the_field('office_location'); ?></p>



			</div>

			<?php if(get_field("profile_photo")) { ?>

				<div class="singleDirectoryPhoto">
					<?php

					$image = get_field('profile_photo');
					$size = 'large'; // (thumbnail, medium, large, full or custom size)

					if( $image ) {

						echo wp_get_attachment_image( $image, $size );

					}

					?>
				</div>
			<?php } ?>

		</div>

		<div>

<div class="biopub">

					<div><h2>Bio</h2><?php the_field('description'); ?></div>


		</div>


		<?php //the_content(); ?>




	</div><!-- .entry-content -->
</article><!-- #post-## -->
