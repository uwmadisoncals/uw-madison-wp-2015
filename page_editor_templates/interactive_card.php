<?php //Interactive Card ?>

<?php 
    $front_image = get_sub_field('front_image');
    $back_image = get_sub_field('back_image');

    

    $size = 'medium'; // (thumbnail, medium, large, full or custom size)
    
    if( $front_image ) {
        $front_img_elem = wp_get_attachment_image( $front_image, $size );
       $front_img_url = wp_get_attachment_image_url( $front_image, $size );
    
    }

    if( $back_image ) {
        $back_img_elem = wp_get_attachment_image( $back_image, $size );
       $back_img_url = wp_get_attachment_image_url( $back_image, $size );
    
    }
    
    ?>

<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
	<div class="flipper">
		<div class="front">
            <!-- front content -->
            <?php echo $front_img_elem; ?>
		</div>
		<div class="back">
            <!-- back content -->
            <?php echo $back_img_elem; ?>
		</div>
	</div>
</div>