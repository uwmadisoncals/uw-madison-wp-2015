<?php  //Download Table Template  ?>

<?php $numofcolumns = get_sub_field('number_of_columns');  ?>

<?php $col1title = get_sub_field('column_1_title'); ?>
<?php $col2title = get_sub_field('column_2_title'); ?>
<?php $col3title = get_sub_field('column_3_title'); ?>
<?php $col4title = get_sub_field('column_4_title'); ?>

<?php if($numofcolumns == "two") { ?>


    <?php if( have_rows('table_rows_twocol') ): ?>
        <div class="downloadtable download2col">
            <div class="colTitle"><?php echo $col1title; ?></div>
            <div class="colTitle"><?php echo $col2title; ?></div>

            <?php while( have_rows('table_rows_twocol') ): the_row(); ?>

                <div><?php the_sub_field('first_column'); ?></div>

                    <div><?php if(get_sub_field('second_column')) { ?><a href="<?php the_sub_field('second_column'); ?>" target="_blank">X</a><?php } ?></div>


            <?php endwhile; ?>

        </div>

    <?php endif; ?>

<?php } else if($numofcolumns == "three") { ?>
    <?php if( have_rows('table_rows_threecol') ): ?>
        <div class="downloadtable download3col">

            <div class="colTitle"><?php echo $col1title; ?></div>
            <div class="colTitle"><?php echo $col2title; ?></div>
            <div class="colTitle"><?php echo $col3title; ?></div>

            <?php while( have_rows('table_rows_threecol') ): the_row(); ?>

                <div><?php the_sub_field('first_column'); ?></div>


                <div><?php if(get_sub_field('second_column')) { ?><a href="<?php the_sub_field('second_column'); ?>" target="_blank">X</a><?php } ?></div>

                <div><?php if(get_sub_field('third_column')) { ?><a href="<?php the_sub_field('third_column'); ?>" target="_blank">X</a><?php } ?></div>


            <?php endwhile; ?>

        </div>

    <?php endif; ?>

<?php } else if($numofcolumns == "four") { ?>

    <?php if( have_rows('table_rows_fourcol') ): ?>
        <div class="downloadtable download3col">

            <div class="colTitle"><?php echo $col1title; ?></div>
            <div class="colTitle"><?php echo $col2title; ?></div>
            <div class="colTitle"><?php echo $col3title; ?></div>
            <div class="colTitle"><?php echo $col4title; ?></div>

            <?php while( have_rows('table_rows_fourcol') ): the_row(); ?>

                <div><?php the_sub_field('first_column'); ?></div>

                <div><?php if(get_sub_field('second_column')) { ?><a href="<?php the_sub_field('second_column'); ?>" target="_blank">X</a><?php } ?></div>

                <div><?php if(get_sub_field('third_column')) { ?><a href="<?php the_sub_field('third_column'); ?>" target="_blank">X</a><?php } ?></div>
                <div><?php if(get_sub_field('fourth_column')) { ?><a href="<?php the_sub_field('fourth_column'); ?>" target="_blank">X</a><?php } ?></div>

            <?php endwhile; ?>

        </div>

    <?php endif; ?>

<?php } ?>

<style>

    .downloadtable {
        display: grid;
    }

    .downloadtable > div {
        padding: 0.4rem;
        padding-left: 0.8rem;
        padding-right: 0.8rem;
        border-bottom: 1px solid rgba(0,0,0,0.14);
    }

    div.colTitle {
        font-weight: bold;
        font-size: 1.2rem;
        border-bottom: 2px solid rgba(0,0,0,0.3);
    }

    .downloadtable.download2col {
        grid-template-columns: 1fr 1fr;
    }

    .downloadtable.download3col {
        grid-template-columns: 1fr 1fr 1fr;
    }

    .downloadtable.download4col {
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }

</style>