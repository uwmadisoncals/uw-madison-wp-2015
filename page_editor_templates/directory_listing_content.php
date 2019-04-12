<?php //directory include
$hideprofilephotos = get_sub_field('hide_profile_photos'); ?>
    <li>
        <?php if($hideprofilephotos) { ?>

        <?php } else { ?>
        <div class="personPhoto"><?php

$image = get_field('profile_photo');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

} else { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/personplaceholder.png" alt="person">
<?php }

?></div>
<?php } ?>
        <div class="personInfo">
        <div class="name"><a href="<?php the_permalink(); ?>"><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></a></div>

        <em class="jobtitle"><?php the_field('position_title'); ?></em>



        </div>

        <div class="personAux">
             <div class="aux">
            <div class="phone"><?php the_field('phone_number'); ?></div>
            <div class="email"><a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a></div>

            </div>
        </div>


    </li>