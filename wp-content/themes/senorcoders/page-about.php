<?php get_header('about');  /* Template Name: About*/?>

<?php

// check if the repeater field has rows of data
if( have_rows('content_rows') ):

 	// loop through the rows of data
    while ( have_rows('content_rows') ) : the_row(); ?>

       <div class="about-section <?php the_sub_field('background_color'); ?>">
    <div class="container">
    
      <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="pages-subtitle"> <?php the_sub_field('main_title'); ?></h2>
          <div class="subtitle-decorator"></div>
        </div>
        <div class="space-separator"></div>
        <div class="col-lg-12">
          <?php the_sub_field('content'); ?>
        </div>
      </div>
    </div>
  
  </div>

 <?php   endwhile;



endif;

?>
 

<div id="carot-position"></div>
<?php get_footer(); ?>