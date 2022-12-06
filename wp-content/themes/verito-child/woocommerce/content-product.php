<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

$Verito = new Verito();

global $product, $woocommerce_loop, $yith_wcwl,$verito_Options;


// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
  return;
}



 $shop_design = isset($_GET['layout']) ? $_GET['layout'] : '';
if (!in_array($shop_design, array('full','left','right'))) {
  
$layout_array=array(1=>"left",2=>"right",3=>"full",4=>"left");
$page_id = wc_get_page_id('shop');
$design = get_post_meta($page_id ,'verito_page_layout', true);

if(isset($design) && !empty($design))
{
$shop_design = $layout_array[$design];
}
else
{
$shop_design="left"; 
}
}


// Extra post classes
$classes = array();
if (is_cart()) {

    $classes[] = 'item col-lg-3 col-md-3 col-sm-4 col-xs-6';

} else {

   if($shop_design=="full")
   {
    $classes[] = 'item col-lg-3 col-md-3 col-sm-3 col-xs-3';
   }
   else{
$classes[] = 'item col-lg-4 col-md-4 col-sm-4 col-xs-6';
   }
}



?>


<li <?php wc_product_class($classes); ?>>
                
  <div class="item-inner">
     <div class="item-img">
         <div class="item-img-info">

           <div class="pimg">
            <?php do_action('woocommerce_before_shop_loop_item'); ?>        
            <a href="<?php the_permalink(); ?>" class="product-image">
              
                  <?php
                     /**
                      * Hook: woocommerce_before_shop_loop_item_title.
                      *
                      * @hooked woocommerce_show_product_loop_sale_flash - 10
                      * @hooked woocommerce_template_loop_product_thumbnail - 10
                      */
                     do_action( 'woocommerce_before_shop_loop_item_title' );
                     ?>
             
            </a>
                <?php if ($product->is_on_sale()) : ?>

               <?php echo apply_filters('woocommerce_sale_flash', ' <div class="sale-label sale-top-left">' . esc_html__('Sale', 'woocommerce') . '</div>', $post, $product); ?>

               <?php endif; ?>

          </div>
    
          <div class="box-hover">

               <ul class="add-to-links">
                          <li>

                            <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
                                     
                                           <a class="detail-bnt yith-wcqv-button link-quickview" 
                                           data-product_id="<?php echo esc_html($product->get_id());?>"></a>
                                    
                            <?php } ?>

                          <li>
                            <?php if (isset($yith_wcwl) && is_object($yith_wcwl)) {

                                     $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'class="add_to_wishlist link-wishlist"' : 'class="add_to_wishlist link-wishlist"';
                                    ?>
                                      <a title="<?php esc_attr_e('Add to Wishlist','verito');?>" href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id() ) ) ?>"  data-product-id="<?php echo esc_html($product->get_id()); ?>" data-product-type="<?php echo esc_html($product->get_type()); ?>" <?php echo wp_specialchars_decode($classes); ?>><span><?php esc_attr_e('Add to Wishlist', 'verito'); ?></span></a> 
                              
                            <?php } ?>
                         </li>
                          <li>
                            
                            <?php if (class_exists('YITH_Woocompare_Frontend')) {
                                           $mgk_yith_cmp = new YITH_Woocompare_Frontend; ?>

                                        <a title="<?php esc_attr_e('Add to Compare','verito');?>" href="<?php echo esc_url($mgk_yith_cmp->add_product_url($product->get_id())); ?>" class="link-compare add_to_compare compare " data-product_id="<?php echo esc_html($product->get_id()); ?>"><span><?php esc_attr_e('Add to Compare', 'verito'); ?></span></a>
                               
                            <?php } ?> 
                          </li>
                </ul>

               </div>
            </div>
          </div>
                    
      <div class="item-info">
          <div class="info-inner">

             <div class="item-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
             </div>

             <div class="desc std">
                 <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt) ?>
             </div>

              <div class="item-content">

                 <div class="rating">
                    <div class="ratings">
                        <div class="rating-box">
                           <?php $average = $product->get_average_rating(); ?>
                          <div style="width:<?php echo esc_html(($average / 5) * 100); ?>%" class="rating">
                           </div>
                         </div>
                      </div>
                  </div>

               <div class="item-price">
                   <div class="price-box">
                    <?php echo wp_specialchars_decode($product->get_price_html()); ?>
                   </div>
                </div>
                          
              <div class="action">
                  <?php
                  /**
                   * Hook: woocommerce_after_shop_loop_item.
                   *
                   * @hooked woocommerce_template_loop_product_link_close - 5
                   * @hooked woocommerce_template_loop_add_to_cart - 10
                   */
                  do_action( 'woocommerce_after_shop_loop_item' );                
                  
                  ?> 
              </div>
            </div>
        </div>
     </div>
    </div>
</li>





                