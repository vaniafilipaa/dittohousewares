<?php
/* Add your custom functions here */
function verito_child_theme_enqueue_styles() {
       $parent_style = 'verito-style'; // This is 'Responsive-style' for the Responsive theme.
       wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
       wp_enqueue_style( 'child-style',
                     get_stylesheet_directory_uri() . '/style.css',
                     array( $parent_style ),
                     wp_get_theme()->get('Version')
       );
       wp_enqueue_style( 'bootstrap',
                     get_stylesheet_directory_uri() . '/css/bootstrap.min.css',
                     array( $parent_style ),
                     wp_get_theme()->get('Version')
       );
}
add_action( 'wp_enqueue_scripts', 'verito_child_theme_enqueue_styles' );

function custom_scripts() {
       wp_register_script( 'custom-script', get_stylesheet_directory_uri() . '/js/scripts.js', array() , false, true );
       wp_enqueue_script( 'custom-script' );
}
function bootstrap_enqueue_scripts() {
       wp_register_script( 'bootstrap',
           get_stylesheet_directory_uri() . '/js/bootstrap.min.js',
           array() , false, true );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts', 99 );
add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_scripts', 1);

add_action( 'wp_enqueue_scripts', 'themeprefix_slick_enqueue_scripts_styles' );
function themeprefix_slick_enqueue_scripts_styles() {
    wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.6.0', true );
//    wp_enqueue_script( 'slickjs-init', get_stylesheet_directory_uri(). '/js/slick-init.js', array( 'slickjs' ), '1.6.0', true );

    wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri() . '/css/slick.css', '1.6.0', 'all');
    wp_enqueue_style( 'slickcsstheme', get_stylesheet_directory_uri(). '/css/slick-theme.css', '1.6.0', 'all');
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 40 );






add_action('wp_ajax_retrieveUsersData','retrieveUsersData');
add_action('wp_ajax_nopriv_retrieveUsersData', 'retrieveUsersData');


// //this is wordpress ajax that can work in front-end and admin areas
// add_action('wp_ajax_nopriv_your_ajax', 'your_ajax_function');
// add_action('your_ajax', 'your_ajax_shortcode_function');

function retrieveUsersData(){

    // the first part is a SWTICHBOARD that fires specific functions according to the value of Query Variable 'fn'

    switch($_REQUEST['fn']){
        case 'run_shortcode_function':
            $output = your_ajax_shortcode_function($_REQUEST['some_needed_value']);
            break;
        default:
            $output = 'No function specified.';
            break;

    }

    // at this point, $output contains some sort of data that you want back
    // Now, convert $output to JSON and echo it to the browser
    // That way, we can recapture it with jQuery and run our success function

    $output=json_encode($output);
    if(is_array($output)){
        print_r($output);
    }
    else{
        echo $output;
    }
    die;
}

function your_ajax_shortcode_function($productSKU)
{
    $productID = wc_get_product_id_by_sku($productSKU);
    return do_shortcode('[product_page id=' . $productID . ']');
}
