<?php  //Image Carousel Template  ?>

<?php $slideoptions = get_sub_field('slide_options'); ?>
<?php $interval = get_sub_field('rotate_interval'); ?>



<?php if( have_rows('carousel_slide') ): ?>
    <div class="carousel_wrapper">




	<?php while( have_rows('carousel_slide') ): the_row();

		// vars
		$title = get_sub_field('slide_title');
		$subtitle = get_sub_field('slide_subtitle');
		$internallink = get_sub_field('internal_link');
		$externallink = get_sub_field('external_link');
		$slideimage = get_sub_field('slide_image');
		$photocredits = get_sub_field('photo_credits');


		?>

		<div class="carousel_slide carousel-cell">

			<div class="carousel_text">
				<?php if($internallink) { ?>
					<a href="<?php echo $internallink ?>" class="carousel_title"><?php echo $title; ?></a>
				<?php } else if($externallink) { ?>
					<a href="<?php echo $externallink ?>" class="carousel_title"><?php echo $title; ?></a>
				<?php } else { ?>
					<div class="carousel_title"><?php echo $title; ?></div>
				<?php } ?>

				<div class="carousel_subtitle">
					<?php echo $subtitle; ?>
				</div>

				<?php if($photocredits) { ?>
				<div class="carousel_photocredit">
					Photo Credit: <?php echo $photocredits; ?>
				</div>
				<?php } ?>
			</div>

			<div class="overlay"></div>

			<div class="carousel_image">
				<?php echo wp_get_attachment_image( $slideimage, 'large' ); ?>
			</div>

		</div>

	<?php endwhile; ?>

	</div>



<?php endif; ?>


<style>


		.carousel_slide {
			width: 100%;

			height: 500px;
			overflow: hidden;
			position: relative;
		}

		.carousel_slide .overlay {
			position: absolute;
			bottom: 0px;
			height: 50%;
			left: 0px;
			right: 0px;
			z-index:1;
			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0+0,0.65+100 */
background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 ); /* IE6-9 */

		}

		.carousel_slide .carousel_title {
			display: block;
			font-size: 2rem;
			color: #fff;
			font-family: "Verlag-Black";
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 1px;
			margin-bottom: 0px;
			line-height: 1;
		}

		.carousel_slide .carousel_photocredit {
			position: absolute;
			bottom: 10px;
			right: 10px;
			z-index:5;
			font-size: 0.8rem;
			color: rgba(255,255,255,0.6);

		}

		.carousel_slide .carousel_subtitle {
			display: block;
			font-size: 1.5rem;
			color: rgba(255,255,255,0.7);
			font-family: "Verlag-Book";
			line-height: 1;
			letter-spacing: 1px;
		}

		.carousel_slide .carousel_text {
			position: absolute;
			bottom: 2rem;
			left: 2rem;
			right: 2rem;
			z-index:3;
			max-width: 1070px;
			margin: 0 auto;
		}

		.carousel_image {
			position: absolute;
			top: 0px;
			left: 0px;
			right: 0px;
			bottom: 0px;

		}

		.carousel_image img {
			object-fit: cover;
			width: 100%;
			height: 100%;
		}


	</style>
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>



		<?php if($slideoptions[0] == "rotate") { ?>

			<script>
			var elem = document.querySelector('.carousel_wrapper');
			var flkty = new Flickity( elem, {
			// options
			cellAlign: 'left',
			contain: true,
			wrapAround: true,
			autoPlay: <?php echo $interval ?>000
			});
			</script>
		<?php } else { ?>


		<script>
		var elem = document.querySelector('.carousel_wrapper');
		var flkty = new Flickity( elem, {
		// options
		cellAlign: 'left',
		contain: true,
		wrapAround: true
		});
		</script>
	  <?php } ?>
