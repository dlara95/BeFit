<?php get_header(); /*Template Name: Classes*/ ?>
<div class="section-classess">
    <div class="container">
      <div class="row">
        <?php

        // check if the repeater field has rows of data
        if( have_rows('class_list') ):

          // loop through the rows of data
            while ( have_rows('class_list') ) : the_row(); ?>

               <div class="col-lg-4 col-sm-6">
          <div class="classes_box">
            <div class="date_box">
              <p><?php the_sub_field('schedule'); ?></p>
            </div>
            <div class="classes_img" style="background-image: url(<?php the_sub_field('class_image'); ?>);"></div>
            <div class="classes_detail">
              <h3><?php the_sub_field('class_name'); ?></h3>
              <p><?php the_sub_field('class_small_description'); ?></p>
              <p class="read_more"><a href="<?php the_sub_field('class_link'); ?>" class="classes_more">Read More</a></p>
            </div>
          </div>
        
        </div>

         <?php   endwhile;


        endif;

        ?>
       
      </div>
    </div>
</div>
<?php get_footer(); ?>