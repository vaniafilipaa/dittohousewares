<?php
/* Template name: About */
get_header();
?>

<div class="container">
    <?php
        echo do_shortcode('[smartslider3 slider="2"]');
    ?>
</div>
<div class="container about-container">
    <div class="row">
        <div class="col-12">
            <div class="about-row">
                <h3 class="title"><?php echo get_the_title(); ?></h3>
                <?php echo get_the_content(); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="about-row">
                <h3 class="title">Our Clients</h3>
                <div class="">
                    <img src="<?php echo get_field('image'); ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>