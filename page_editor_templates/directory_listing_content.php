<?php //directory include ?>
    <li>
        <div class="personPhoto"><?php 

$image = get_field('profile_photo');
$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

}

?></div>
        <div class="personInfo">
        <div class="name"> <?php the_field('first_name'); ?> <?php the_field('last_name'); ?> </div>
        
        <em class="jobtitle"><?php the_field('position_title'); ?></em>

       

        </div>

        <div class="personAux">
             <div class="aux">
            <div class="phone"><?php the_field('phone_number'); ?></div>
            <div class="email"><a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></div>
            <div class="location"><?php the_field('office_location'); ?></div>
            </div>
        </div>


    </li>