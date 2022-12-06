<?php
/* Template name: Home */

get_header();

?>
<div class="container">
    <?php
        echo do_shortcode('[smartslider3 slider="1"]');
    ?>
</div>
<div class="container-fluid">
    <div id="section2" class="row row-huge-btns">
        <div class="col-xs-12 col-sm-4">
            <a href="/" target="_self">
                <span>Preparation</span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-4">
            <a href="/" target="_self">
                <span>Serving</span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-4">
            <a href="/" target="_self">
                <span>Collections</span>
            </a>
        </div>
    </div>
</div>
<div class="container home-container">
    <div id="section3" class="row">
        <div class="col-12">
            <h3 class="title">Our Products</h3>
            <div class="nav nav-tabs" id="ourProductsTab" role="tablist">
                <a class="nav-item nav-link active" id="topProducts-tab" data-toggle="tab" href="#topProducts" role="tab" aria-controls="topProducts" aria-selected="true">Top Products</a>
                <a class="nav-item nav-link" id="newArrivals-tab" data-toggle="tab" href="#newArrivals" role="tab" aria-controls="newArrivals" aria-selected="false">New Arrivals</a>
                <a class="nav-item nav-link" id="bestSellers-tab" data-toggle="tab" href="#bestSellers" role="tab" aria-controls="bestSellers" aria-selected="false">Best Sellers</a>
            </div>
            <div class="tab-content" id="ourProductsTabContent">
                <div class="tab-pane fade show active" id="topProducts" role="tabpanel" aria-labelledby="topProducts-tab">
                    <div id="ourProductsCarousel" class="owl-carousel owl-theme">
                        <?php 
                            $field = get_field('top_products');
                            foreach($field as $productId) {
                                $product = wc_get_product( $productId );
                                $productTitle = $product->get_title();
                                $productHref = $product->get_permalink();
                                $image_id = $product->get_image_id();
                        ?>
                            <div class="item">
                                <a href="<?php echo $productHref; ?>" target="_self">
                                    <img class="img-responsive" src="<?php echo wp_get_attachment_image_url($image_id,'medium'); ?>" alt="<?php echo $productTitle ?>">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="newArrivals" role="tabpanel" aria-labelledby="newArrivals-tab">
                    <div class="owl-carousel owl-theme">
                    <?php 
                        $field = get_field('new_arrivals');
                        foreach($field as $productId) {
                            $product = wc_get_product( $productId );
                            $productTitle = $product->get_title();
                            $productHref = $product->get_permalink();
                            $image_id = $product->get_image_id();
                    ?>
                        <div class="item">
                            <a href="<?php echo $productHref; ?>" target="_self">
                                <img class="img-fluid" src="<?php echo wp_get_attachment_image_url($image_id,'medium'); ?>" alt="<?php echo $productTitle ?>">
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="bestSellers" role="tabpanel" aria-labelledby="bestSellers-tab">
                    <div class="owl-carousel owl-theme">
                        <?php 
                            $field = get_field('best_sellers');
                            foreach($field as $productId) {
                                $product = wc_get_product( $productId );
                                $productTitle = $product->get_title();
                                $productHref = $product->get_permalink();
                                $image_id = $product->get_image_id();
                        ?>
                            <div class="item">
                                <a href="<?php echo $productHref; ?>" target="_self">
                                    <img class="img-fluid" src="<?php echo wp_get_attachment_image_url($image_id,'medium'); ?>" alt="<?php echo $productTitle ?>">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section4" class="row">
        <div class="col-xs-12 col-sm-6">
            <a href="<?php echo get_field("link_left_banner")?>" target="_self">
                <img src="<?php echo get_field("image_left_banner")['url']; ?>" alt="">
                <div class="text-content">
                    <h3><?php echo get_field("text_left_banner")?></h3>
                    <?php if(get_field("subtitle_left_banner")){ ?> 
                        <h4><?php echo get_field("subtitle_left_banner")?></h4>
                    <?php } ?>
                </div>
                <?php if(get_field("tag_left_banner")){ ?> 
                    <div class="bottom-text">
                        <p><?php echo get_field("tag_left_banner")?></p>
                    </div>
                <?php } ?>
            </a>
        </div>
        <div class="col-xs-12 col-sm-6">
            <a href="<?php echo get_field("link_right_banner")?>" target="_self">
                <img src="<?php echo get_field("image_right_banner")['url']; ?>" alt="">
                <div class="text-content">
                    <h3><?php echo get_field("text_right_banner")?></h3>
                    <?php if(get_field("subtitle_right_banner")){ ?> 
                        <h4><?php echo get_field("subtitle_right_banner")?></h4>
                    <?php } ?>
                </div>
                <?php if(get_field("tag_right_banner")){ ?> 
                    <div class="bottom-text">
                        <p><?php echo get_field("tag_right_banner")?></p>
                    </div>
                <?php } ?>
            </a>
        </div>
    </div>
</div>

<!-- <div class="container-fluid">
    <a href="<?php echo get_field("link_bottom_slide") ?>" target="_self">
        <div id="section5" class="row" style="background-image: url(<?php echo get_field("image_bottom_slide")?>)">
            <div class="text-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php echo get_field("subtitle_bottom_slide") ?></h4>
                            <h3><?php echo get_field("title_bottom_slide") ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div> -->

<div class="container-fluid">
    <?php
        echo do_shortcode('[smartslider3 slider="3"]');
    ?>
</div>

<?php
verito_theme_homepage();
get_footer();


?>

<script>
jQuery(function ($) {
    $(document).ready(function(){
        $('#ourProductsTabContent .owl-carousel').owlCarousel({
            items:4,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:3
                }
            }
        })
    });
})
</script>