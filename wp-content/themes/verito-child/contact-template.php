<?php
/* Template name: Contact */
get_header();
?>
<div class="container contact-container">
  <div class="row">
    <div class="contact-row">
      <div class="col-xs-12">
          <h3 class="title">
            <?php $Verito->verito_page_title(); ?>
          </h3>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tinci, consectetuer adipiscing elit, sed diam nonummy nibh euismod tinci, consectetuer adipiscing elit, sed diam nonummy nibh euismod tinci</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-xs-12 col-sm-4">
            <p class="title">Contact us by phone</p>
        </div>
        <div class="col-xs-12 col-sm-8">
            <p><a href="tel:+351227539195">+351 227 539 195</a></p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <p class="title">Address</p>
        </div>
        <div class="col-xs-12 col-sm-8">
            <p>DITTO :: housewares Design & Distribuição, Lda.<br>Rua das Marinhas, 23 Gulpilhares<br>4405-663 Vila Nova de Gaia - Portugal</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-4">
            <p class="title">Email</p>
        </div>
        <div class="col-xs-12 col-sm-8">
            <p><a href="">mail@ditto-housewares.com</a></p>
        </div>
      </div>
      





    </div>
    
  </div>

  <div class="row">
      <div class="contact-row">
        <?php while (have_posts()) : the_post(); ?>

          <!-- <div class="page-content"> -->
            <?php the_content(); ?>

            <?php
            wp_link_pages(array('before' => '<div class="post_paginate">' . esc_html__('Pages:&nbsp;', 'verito'), 'after' => '</div>', 'next_or_number' => 'number', 'nextpagelink' => '<span class="next">' . esc_html__('Next &raquo;', 'verito') . '</span>', 'previouspagelink' => '', 'link_before' => '<span>', 'link_after' => '</span>'));
            ?>

          <!-- </div> -->

        <?php endwhile;
        ?>
      </div>
  </div>
</div>

<?php get_footer(); ?>