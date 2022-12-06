<?php

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
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="banner-heading">
          <?php $queriedObject = get_queried_object();
          if (!is_search()) {
            if (get_field('banner', 'product_cat_' . $queriedObject->term_id)) { ?>
              <img src="<?php echo get_field('banner', 'product_cat_' . $queriedObject->term_id); ?>" alt="<?php esc_html(woocommerce_page_title()); ?>" class="img-fluid">
            <?php
            } else {
            ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner-placeholder.png" alt="<?php esc_html(woocommerce_page_title()); ?>" class="img-fluid">
            <?php
            }
          } else { ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner-placeholder.png" alt="<?php esc_html(woocommerce_page_title()); ?>" class="img-fluid">
          <?php } ?>
          <div class="page-heading-content">
            <h2 class="page-heading">
              <span class="page-heading-title">
                <?php esc_html(woocommerce_page_title()); ?>
              </span>
              <?php if (!is_search()) { ?>
                <div class="breadcrumbs"><?php woocommerce_breadcrumb($args); ?></div>
              <?php } ?>
            </h2>
          </div>
        </div>
      </div>

      <?php

//      do_action('woocommerce_before_main_content');

      /**
       * woocommerce_before_main_content hook
       *
       * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
       * @hooked woocommerce_breadcrumb - 20
       */

      ?>

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
      <div class="<?php echo esc_html($col); ?> pro-grid">

        <?php do_action('woocommerce_archive_description'); ?>

        <div class="col-main pro-grid">

          <?php if (have_posts()) { ?>

            <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
              <div class="grid-heading">
                <h2 class="page-heading">
                  <div class="display-product-option">
                    <div class="toolbar">
                      <?php
                      /**
                       * woocommerce_before_shop_loop hook
                       *
                       * @hooked woocommerce_result_count - 20
                       * @hooked woocommerce_catalog_ordering - 30
                       */
                      do_action('woocommerce_before_shop_loop');
                      ?>
                    </div>
                  </div>
                </h2>
              </div>
            <?php endif; ?>

            <div class="category-products">
              <?php woocommerce_product_loop_start(); ?>
              <?php woocommerce_product_subcategories(); ?>
              <?php if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                  the_post();

                  /**
                   * Hook: woocommerce_shop_loop.
                   *
                   * @hooked WC_Structured_Data::generate_product_data() - 10
                   */
                  do_action('woocommerce_shop_loop');

                  wc_get_template_part('content', 'product');
                }
              }


              woocommerce_product_loop_end();


              ?>
              <div class="after-loop">
                <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                ?>
              </div>
            </div>


          <?php
          } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
          } ?>



        </div>
      </div>



      <?php if (empty($rightbar) && $rightbar != 'hidesidebar') { ?>
        <div id="column-right" class="col-right sidebar  col-sm-3 col-xs-12  <?php echo esc_html($rightbar) ?>">
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


    </div>
  </div>
</div>
<?php
/**
 * woocommerce_after_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<?php get_footer('shop'); ?>