<?php

  if ( ! function_exists ( 'verito_logo_image' ) ) {
function verito_logo_image()
{ 
     global $verito_Options;

        $logoUrl = VERITO_THEME_URI . '/images/logo.png';
        
        if (isset($verito_Options['header_use_imagelogo']) && $verito_Options['header_use_imagelogo'] == 0) {           ?>
        <a class="logo logotext logo-title" title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(get_home_url()); ?> ">
        <?php bloginfo('name'); ?>
        </a>
        <?php
        } else if (isset($verito_Options['header_logo']['url']) && !empty($verito_Options['header_logo']['url'])) { 
                  $logoUrl = $verito_Options['header_logo']['url'];
                  ?>
        <a class="logo" title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(get_home_url()); ?> "> <img
                      alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logoUrl); ?>"
                      height="<?php echo !empty($verito_Options['header_logo_height']) ? esc_html($verito_Options['header_logo_height']) : ''; ?>"
                      width="<?php echo !empty($verito_Options['header_logo_width']) ? esc_html($verito_Options['header_logo_width']) : ''; ?>"> </a>
        <?php
        } else { ?>
        <a class="logo" title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(get_home_url()); ?> "> 
          <img src="<?php echo esc_url($logoUrl) ;?>" alt="<?php bloginfo('name'); ?>"> </a>
        <?php }  

}
}
?>
