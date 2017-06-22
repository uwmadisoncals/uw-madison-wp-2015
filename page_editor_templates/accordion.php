<?php  //Accordion Template  ?>


    <?php if( have_rows('accordion_row') ): ?>
    <div class="accordion_wrapper">


	<?php while( have_rows('accordion_row') ): the_row(); 

		// vars
		$title = get_sub_field('accordion_row_title');
		$content = get_sub_field('accordion_row_content');
		

		?>

		<div class="accordion_row">

            <a href="#" class="accordion_title"><span class="symbol">+</span><?php echo $title; ?></a>

			<div class="accordion_content">
                <?php echo $content; ?>
            </div>

			
		   

		</div>

	<?php endwhile; ?>

	</div>

<?php endif; ?>
