<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body <?php body_class(); ?>>
            <?php  $url = home_url(); ?>
  
  <header class="home-header">
    
    <div class="nav-overlay">
       <div class="top-header">
        <div class="container">
             <?php include 'inc/top-header.php'; ?>

        </div>
      </div>
      <div class="lower-header">
         <nav class=" container navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $url; ?>">
           <?php  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                  if ( has_custom_logo() ) {
                          echo '<img  alt="Logo" src="'. esc_url( $logo[0] ) .'">';
                  } else {
                          echo  get_bloginfo( 'name' );
                  } ?>
           </a>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id'  => 'primary-menu', 'container'=> false,  'menu_class' => 'navbar-nav ml-auto mt-2 mt-lg-0' ) ); ?>

            
          </div>
        </nav>
      </div>
       
       </div>
    
    <div id="homeCarousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active slide-1 "> </div>
           <div class="carousel-item  slide-2"> </div>
           <div class="carousel-item  slide-3"> </div>
        

        </div>
      </div>
      <div class="home-caption">
          
            <div id="offerCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#offerCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#offerCarousel" data-slide-to="1"></li>
                  <li data-target="#offerCarousel" data-slide-to="2"></li>
                </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <h2>Lorem Ipsum Test</h2>
                     <a href="#">Learn More</a>
                </div>
                <div class="carousel-item">
                       <h2>Lorem Ipsum 2</h2>
                     <a href="#">Learn More</a>                
                </div>
                <div class="carousel-item">
                   <h2>Lorem Ipsum 3</h2>
                     <a href="#">Learn More</a>
                </div>
              </div>
              <a class="carousel-control-prev" href="#offerCarousel"  role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#offerCarousel"  role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
  
  </header>