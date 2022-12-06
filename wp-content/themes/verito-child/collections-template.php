<?php
/* Template name: Collections template */
get_header();
?>

<div class="container collections-container">
    <div class="row">
        <div class="col-xs-12">
            <div id="section2">
                <h3 class="title"><?php echo get_the_title(); ?></h3>
            </div>
        </div>
    </div>

    <?php 
    if( have_rows('collection') ):
        while( have_rows('collection') ) : the_row();
            $image = get_sub_field('image');
            $name = get_sub_field('name');
            $desc = get_sub_field('small_description');
            $link = get_sub_field('link');

            $remainder = get_row_index() % 2;
            if($remainder == 0){
        ?> 
            <div class="row row-same-height">
                <div class="col-sm-4 col-xs-12">
                    <div class="text-content">
                        <h4><?php echo $name; ?></h4>
                        <p><?php echo $desc; ?></p>
                        <a href="<?php echo $link; ?>" target="_self">See more</a>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                </div>
            </div>
        <?php
            } else {
        ?>
            <div class="row row-same-height">
                <div class="col-sm-8 col-xs-12">
                    <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="text-content">
                        <h4><?php echo $name; ?></h4>
                        <p><?php echo $desc; ?></p>
                        <a href="<?php echo $link; ?>" target="_self">See more</a>
                    </div>
                </div>
            </div>
        <?php
            }
        endwhile;
    else :
    endif;
?>
</div>

<?php
get_footer();
?>