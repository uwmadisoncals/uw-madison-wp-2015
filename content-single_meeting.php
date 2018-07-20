<?php
/**
 * @package UW Madison WP 2015
 */
?>

<style>
.meetingContent {
	padding-top: 2rem;
}

.meetingContent h2 {
	margin-top: 0px;
}

.meetingContent .span-66 {
	font-size: 1.5rem;
}

.materials a {
	display: block;
	padding-top: 0.5rem;
	padding-bottom: 0.5rem;

}

.location {
	margin-top: 0.5rem;
	font-size: 1.5rem;
}
</style>

<?php $postedbylocation = get_theme_mod('uw-madison-wp-2015_postedby_id'); ?>
<article class="directory" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">



					<h1 class="entry-title"><?php the_title();?></h1>
					<h2 class="entrySubTitle"><?php the_field('meeting_time'); ?></h2>

<div class="location"><svg enable-background="new 0 0 24 24" height="24px" id="Layer_1" version="1.1" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M11.513,12.38c-2.117,0-3.835-1.729-3.835-3.862c0-2.135,1.718-3.863,3.835-3.863s3.835,1.729,3.835,3.863  C15.348,10.65,13.63,12.38,11.513,12.38 M11.513,0C6.825,0,3.025,3.827,3.025,8.549c0,4.46,3.844,10.213,6.411,13.014  c0.959,1.045,2.076,2.454,2.076,2.454s1.2-1.417,2.229-2.493C16.306,18.84,20,13.451,20,8.549C20,3.827,16.2,0,11.513,0"/></svg> <?php the_field('location'); ?></div>


	</header><!-- .entry-header -->

	<div class="entry-content meetingContent">

		<div class="row">
			<div class="span-50">

				<div><h2>Summary</h2><?php the_field('description'); ?></div>



			</div>

			<div class="span-50" style="padding-left: 2rem;">

				<?php

				// check if the repeater field has rows of data
				if( have_rows('materials') ): ?>
					<div class="materials">
					<h2>Materials</h2>
					<?php  // loop through the rows of data
					while ( have_rows('materials') ) : the_row();

					$file = get_sub_field('file');
					$label = get_sub_field('file_label');

					if( $file ):
						if($label) { ?>
							<a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $label; ?></a>
						<?php } else { ?>
							<a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $file['filename']; ?></a>
						<?php } ?>
					<?php endif; ?>

					<?php endwhile; ?>
					</div>
				<?php else :

					// no rows found

				endif;

				?>

			</div>
		</div>

		<div>

<div>




		</div>


		<?php //the_content(); ?>




	</div><!-- .entry-content -->
</article><!-- #post-## -->
