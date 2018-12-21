<?php //page embed
?>

<div class="embedWrapper">
<?php $post_id = get_sub_field('page_to_embed', false, false); echo $post_id; ?>

<?php $templatetoload = get_page_template_slug( $post_id ); echo $templatetoload; ?>
<?php get_template_part( $templatetoload ); ?>


</div>
