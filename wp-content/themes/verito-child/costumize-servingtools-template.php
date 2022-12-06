<?php
/* Template name: Costumize Serving tools with handles template */
get_header();

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $verito_Options, $post;
get_header('shop');

$plugin_url = plugins_url();

$shop_design = isset($_GET['layout']) ? $_GET['layout'] : '';
if (!in_array($shop_design, array('full', 'left', 'right'))) {

    $layout_array = array(1 => "left", 2 => "right", 3 => "full", 4 => "left");
    $page_id = wc_get_page_id('shop');
    $design = get_post_meta($page_id, 'verito_page_layout', true);

    if (isset($design) && !empty($design)) {
        $shop_design = $layout_array[$design];
    } else {
        $shop_design = "left";
    }
}

$leftbar = $rightbar = $main = '';
switch ($shop_design) {
    case "right":
        $leftbar = 'hidesidebar';
        $main = 'col2-left-layout';
        $col = 'col-sm-9 col-xs-12';
        break;

    case "full":
        $leftbar = $rightbar = 'hidesidebar';
        $main = 'col1-layout';
        $col = 'col-sm-12 col-md-12 col-lg-12 col-xs-12';
        break;

    default:
        $rightbar = 'hidesidebar';
        $main = 'col2-left-layout';
        $col = 'col-sm-9 col-xs-12';
        break;
}
?>

<div class="main-container <?php echo esc_html($main) ?> bounceInUp animated">
    <div class="container customize-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="banner-heading">
                    <img src="<?php echo get_field('banner');?>" alt="Serving tools" class="img-fluid">
                    <div class="page-heading-content">
                        <h2 class="page-heading">
                            <span class="page-heading-title">
                                customize
                            </span>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>
                                        <a class="home" href="<?php echo get_home_url();?>">Início</a>
                                    </li>
                                    <span> ⁄ </span>
                                    <li>
                                        <a href="http://localhost:8080/ditto_housewares/categoria-produto/serving-utensils/">Serving utensils</a>
                                    </li>
                                    <span> ⁄ </span>
                                    <li>
                                        <a>Customize</a>
                                    </li>
                                    <span> ⁄ </span>
                                    <li>
                                        <strong><?php echo the_title(); ?></strong>
                                    </li>
                                </ul>
                            </div>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php if (empty($leftbar) && $leftbar != 'hidesidebar') { ?>
                <div id="column-left" class="col-left sidebar col-sm-3 col-xs-12 <?php echo esc_html($leftbar) ?>">
                    <?php
                    /**
                     * woocommerce_sidebar hook
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    do_action('woocommerce_sidebar');
                    ?>
                </div>
            <?php } ?>

            <div class="col-sm-9 col-xs-12 pro-grid">
                          
                <div class="product-preview"></div>

                <div class="text-content">
                    <div class="col-xs-12">
                        <p>Combine the handle with the gadget it fits you the most.<br>*More colors available by order.</p>
                        <h4>Do you want a new color?</h4>
                        <p class="grey-color"><span data-toggle="modal" data-target="#submitRequestModal">Submit here</span> your request.</p>
                    </div>
                </div>
            
                <div id="servingTools" class="col-xs-12">
                    <h3>Serving tools</h3>
                    <label class="grey-color" for="sortByCollection">Sort by collection:</label>
                    <?php
                    $args = array(
                        'hierarchical' => 1,
                        'show_option_none' => '',
                        'hide_empty' => 0,
                        'parent' => 516,
                        'taxonomy' => 'product_cat'
                    );
                    $subcats = get_categories($args);
                    $removeSeeAll = array_shift($subcats);
                    echo '<select id="sortByCollection">';
                    foreach ($subcats as $key => $sc) {
                        echo '<option value="'.$sc->term_id.'" label="' . $sc->name . '">' . $sc->name . '</option>';
                    }
                    echo '</select>';
                    echo'<div id="servingToolsSlick">';
                    foreach ($subcats as $key => $sc) {
                        echo '<div class="slick-container-'.$sc->term_id.' slick-container d-none">';
                        $args = array( 'post_type' => 'product', 'product_cat' => $sc->name, 'orderby' => 'asc' );
                        $loop = new WP_Query( $args );
                        $slide = 1;
                            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                <div class="product product-<?php echo $product->get_sku();?>" data-ref="<?php echo $product->get_sku(); ?>">    
                                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                                    <div class="text-content">
                                        <span><?php the_title(); ?></span>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            </div>
                            <?php wp_reset_query();  
                    }
                    echo '</div>';
                    ?>
                </div>

                <div id="handles" class="col-xs-12"> 
                    <h3>Handles</h3>
                    <label class="grey-color" for="sortByType">Sort by type:</label>
                    <?php
                        $argsHandles = array(
                            'hierarchical' => 1,
                            'show_option_none' => '',
                            'hide_empty' => 0,
                            'parent' => 158,
                            'taxonomy' => 'product_cat'
                        );
                        $subcatsHandles = get_categories($argsHandles);
                        // $removeSeeAll = array_shift($subcatsHandles);       
                        echo '<select id="sortByType">';
                        foreach ($subcatsHandles as $key => $sc) {
                            echo '<option value="'.$sc->term_id.'" label="' . $sc->name . '">' . $sc->name . '</option>';
                        }
                        echo '</select>';


                    echo '<div id="handlesSlick">';
                    foreach ($subcatsHandles as $key => $sc) {
                        echo '<div class="slick-container-'.$sc->term_id.' slick-container d-none">';
                        $args = array( 'post_type' => 'product', 'product_cat' => $sc->name, 'orderby' => 'asc' );
                        $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                <div class="product product-<?php echo $product->get_sku(); ?>" data-ref="<?php echo $product->get_sku(); ?>">    
                                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                                    <div class="text-content">
                                        <span><?php the_title(); ?></span>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            </div>
                            <?php wp_reset_query();  
                    }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer('shop'); ?>

<div id="submitRequestModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close.png" alt="Close">
            </button>
            <h5 class="modal-title">Submit Request</h5>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismodt.</p>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group row">
                <label for="productName" class="col-sm-4 col-form-label">Product</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="productName" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="collection" class="col-sm-4 col-form-label">Collection</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="collection" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="handle" class="col-sm-4 col-form-label">Handle</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="handle" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="pantoneCode" class="col-sm-4 col-form-label">Insert pantone code of your request</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="pantoneCode" placeholder="">
                </div>
            </div>
            <fieldset class="form-group">
                <h6>Complete your set</h6>
                <div class="row">
                    <label for="handle" class="col-sm-4 col-form-label">Complete collection</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="form-check col-sm-4">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">Yes</label>
                            </div>
                            <div class="form-check col-sm-4">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
            <label for="handle" class="col-sm-4 col-form-label">Choose some pieces</label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="form-check col-xs-4">
                            <input class="form-check-input" type="checkbox" id="piece1">
                            <label class="form-check-label" for="piece1">
                                Soup ladle
                            </label>
                        </div>
                        <div class="form-check col-xs-4">
                            <input class="form-check-input" type="checkbox" id="piece2">
                            <label class="form-check-label" for="piece2">
                                Soup ladle
                            </label>
                        </div>
                        <div class="form-check col-xs-4">
                            <input class="form-check-input" type="checkbox" id="piece3">
                            <label class="form-check-label" for="piece3">
                                Soup ladle
                            </label>
                        </div>
                        <div class="form-check col-xs-4">
                            <input class="form-check-input" type="checkbox" id="piece4">
                            <label class="form-check-label" for="piece4">
                                Soup ladle
                            </label>
                        </div>
                        <div class="form-check col-xs-4">
                            <input class="form-check-input" type="checkbox" id="piece5">
                            <label class="form-check-label" for="piece5">
                                Soup ladle
                            </label>
                        </div>
                        <div class="form-check col-xs-4">
                            <input class="form-check-input" type="checkbox" id="piece6">
                            <label class="form-check-label" for="piece6">
                                Soup ladle
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-sm-4 col-form-label">Message</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="message" rows="4"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="product" class="col-sm-4 col-form-label">Name*</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="product" placeholder="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">E-mail</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 col-sm-offset-4">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
jQuery(function ($) {
    previewItem();

    var activeCollectionID = $("#sortByCollection").val();
    createSlick(activeCollectionID);

    var activeTypeID = $("#sortByType").val();
    createSlick(activeTypeID);

    function createSlick(elID){
        $('.slick-container-' + elID).removeClass('d-none').addClass('active');
        $('.slick-container-' + elID).slick({
            arrows: true,
            dots: false,
            infinite: false,            
            slidesToShow: 3,
            prevArrow:"<img class='a-left control-c prev slick-prev' src='<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-left.png'>",
            nextArrow:"<img class='a-right control-c next slick-next' src='<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-right.png'>",
            responsive: [
                {
                breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        })
    }

    $("#sortByCollection").change(function () {
        $('#servingToolsSlick .slick-container').addClass('d-none');
        activeCollectionID = this.value;
        createSlick(activeCollectionID);
    });

    $("#sortByType").change(function () {
        $('#handlesSlick .slick-container').addClass('d-none');
        activeTypeID = this.value;
        createSlick(activeTypeID);
    });

    $('.product').on('click', function(){
        $(this).closest('.slick-slider').find('.slick-slide').removeClass('selected');
        $(this).closest('.slick-slide').addClass('selected');
        previewItem();
    })
    function previewItem(){
        var servingToolRef = $("#servingToolsSlick .slick-slide.selected").find('.product').attr('data-ref'),
            handleRef = $("#handlesSlick .slick-slide.selected").find('.product').attr('data-ref'),
            customItem = servingToolRef + "_" + handleRef;

            jQuery.ajax({
                url: "http://localhost:8080/ditto_housewares/wp-admin/admin-ajax.php",
                dataType: 'json',
                data: {
                    'action':'retrieveUsersData',
                    'fn':'run_shortcode_function',
                    'some_needed_value': customItem
                },
                success: function(results){
                    $(".product-preview").html(results);
                },
                error: function(errorThrown){console.log(errorThrown);}
            });
    }

    $(document).on('show.bs.modal', '#submitRequestModal', function (e) {
        var product = $(".product-name h1.product_title").text(),
            collection = $("#sortByCollection option:selected").text(),
            handle = $("#sortByType option:selected").text();

        $("#submitRequestModal #productName").val(product);
        $("#submitRequestModal #collection").val(collection);
        $("#submitRequestModal #handle").val(handle);
    });
})

</script>