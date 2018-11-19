<?php get_header(); 
global $wp_query;
?>
  <div class="blog-section">
    <div class="container">
      <div class="row">
          <div class="col-lg-9">
            <?php
            if ( have_posts() ) : ?>

             <?php // The Loop
               while ( have_posts() ) : the_post(); ?>
                
                <div class="row">
                <div class="col-lg-12">
                   <article class="blog_detail">
                      <div class="blog_main_img slass-img"> 
                        <?php if(get_the_post_thumbnail_url()): ?>
                        <div class="img-cont" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
                        <?php else: ?>
                        <div class="img-cont" style="background-image: url(/wp-content/uploads/2018/11/blog_post_placeholder.jpg);"></div>
                        <?php endif; ?>
                        <div class="dd-mm"> <span class="date">16</span><br>
                          <span class="month">Jan</span> </div>
                      </div>
                      <div class="blog_intro">
                        <h3 class="blog_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="info">
                                <p> <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('l, F jS, Y') ?></span> <span> <i class="fa fa-comments"></i><a href="#">  <?php comments_number( 'no comments', 'one comment', '% coments' ); ?>.</a> </span> </p>
                              </div>
                      </div>
                      <p class="blog_pera"> <?php $string = get_the_content();
                            if (strlen($string) > 200) {
                            $string = substr($string, 0, 200) . "..."; 
                            echo strip_tags($string); } ?> </p>
                      <div class="read_social col-sm-12 col-xs-12">
                        <div class="row">
                          <div class="pull-left col"><a href="<?php the_permalink(); ?>"> Read more <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></div>
                          <div class="pull-right col">
                            <div class="social"><span class="txt"> Share </span><a class="circle" target="_blank" href="ttp://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook-f"></i></a><a class="circle" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a><a class="circle" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </article>
                    
                </div>
            
                </div>
            
             <?php endwhile; ?>
             <?php endif; ?>
        
          </div>
      
      </div>
    </div>
    
  </div>
<?php get_footer(); ?>