<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
  return;
}


global $post, $product;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && has_post_thumbnail() ) { 
  $loop = 0;
  ?>
  <div class="more-views">
   <div class="slider-items-products">
     <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
      <div class="slider-items slider-width-col4 block-content">
        <?php

        if( $loop==0)
        {


          $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
          $main_image=wc_get_gallery_image_html( $post_thumbnail_id  );

          $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );

          $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );

          $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );


          $image_size        = apply_filters( 'woocommerce_gallery_image_size', $thumbnail_size );
          $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );

          $thumbnail_src     = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
          $full_src          = wp_get_attachment_image_src( $post_thumbnail_id, $full_size );
          $thumbnail_post   = get_post( $post_thumbnail_id );
          $image_title      = $thumbnail_post->post_content;

          $attributes      = array(
            'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
            'data-caption'            => get_post_field( 'post_excerpt',$post_thumbnail_id),
            'data-src'                => $full_src[0],
            'data-large_image'        => $full_src[0],
            'data-large_image_width'  => $full_src[1],
            'data-large_image_height' => $full_src[2],
            'class'                   => $main_image ? 'wp-post-image' : '',
            );
          $image             = wp_get_attachment_image( $post_thumbnail_id, $image_size, false, $attributes );
          $image_link=$full_src[0];
          $image_title = esc_html($attributes['title']);
          $rel="useZoom: 'zoom1', smallImage: '".$image_link."'";
          $html  = '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image"><div class="more-views-items"><a id="product-zoom"  class="cloud-zoom-gallery1" title="'.$image_title.'" rel="'.$rel.'" data-image="'.$image_link.'" data-zoom-image="'.$image_link.'" href="' . esc_url( $full_src[0]) . '">';
          $html .= $image  ;
          $html .= '</a></div></div>';




          $loop++;

        }

        foreach ( $attachment_ids as $attachment_id ) {

          $main_image=wc_get_gallery_image_html( $attachment_id  );

          $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );

          $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );

          $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );

  

          $image_size        = apply_filters( 'woocommerce_gallery_image_size', $thumbnail_size );
          $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );

          $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
          $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
          $thumbnail_post   = get_post( $attachment_id );
       

          $attributes      = array(
            'title'                   => get_post_field( 'post_title', $attachment_id ),
            'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
            'data-src'                => $full_src[0],
            'data-large_image'        => $full_src[0],
            'data-large_image_width'  => $full_src[1],
            'data-large_image_height' => $full_src[2],
            'class'                   => $main_image ? 'wp-post-image' : '',
            );
          $image             = wp_get_attachment_image( $attachment_id, $image_size, false, $attributes );
          $image_link=$full_src[0];
          $image_title = esc_html($attributes['title']);
          $rel="useZoom: 'zoom1', smallImage: '".$image_link."'";
          $html  .= '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image"><div class="more-views-items"><a id="product-zoom"  class="cloud-zoom-gallery1" title="'.$image_title.'" rel="'.$rel.'" data-image="'.$image_link.'" data-zoom-image="'.$image_link.'" href="' . esc_url( $full_src[0]) . '">';
          $html .= $image  ;
          $html .= '</a></div></div>';

          echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
          $html ='';
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
}
