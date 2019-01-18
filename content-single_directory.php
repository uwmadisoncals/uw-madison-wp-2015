<?php
/**
 * @package UW Madison WP 2015
 */
?>
<?php $postedbylocation = get_theme_mod('uw-madison-wp-2015_postedby_id'); ?>
<style>
.singleDirectoryWrapper div.singleDirectoryPhoto img {
	object-fit: contain;
}

.personMeta {
	font-size: 1rem;
}

.personMeta p {
	margin-top: 0rem;
}
</style>
<article class="directory" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">



					<h1 class="entry-title"><?php the_field('first_name');?> <?php the_field('last_name'); ?></h1>
					<h2 class="entrySubTitle"><?php the_field('position_title'); ?></h2>




	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="singleDirectoryWrapper">
			<div class="singleDirectoryInfo">
				<div class="phone"><?php the_field('phone_number'); ?></div>
				<div><a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></div>
				<p><?php the_field('office_location'); ?></p>

				<?php if( have_rows('additional_fields') ): ?>


				<p>

	<?php while( have_rows('additional_fields') ): the_row();

		// vars
		$label = get_sub_field('additional_label');
		$content = get_sub_field('additional_value');


		?>


				<div class="personMeta">
				<em><?php echo $label; ?></em>
				<?php echo $content; ?>
				</div>


		<?php endwhile; ?>

		</p>

	<?php endif; ?>



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
				<?php if(get_field("bio")) { ?>
					<div><h2>Bio</h2><?php the_field('bio'); ?></div>
				<?php } ?>

				<?php if(get_field("publications")) { ?>
				<div><h2>Publications</h2><?php the_field('publications'); ?></div>
				<?php } ?>
				</div>

		</div>


		<?php //the_content(); ?>




	</div><!-- .entry-content -->
</article><!-- #post-## -->
