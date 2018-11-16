<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Senorcoders
 */

get_header('single');
?>

  <div class="single-post-section">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-10">
        	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

	

		    endwhile; // End of the loop.
		?>
        
        </div>
        
        <div class="col-lg-2">  
        

        </div>
      
      </div>
    
    </div>

  </div>



<?php get_footer(); ?>
