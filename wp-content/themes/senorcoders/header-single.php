<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body <?php body_class(); ?>>
            <?php  $url = home_url(); ?>
  
  <header class="single-header">
    
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
          <div class="single-header-bg"></div>
          <div class="page-title">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <?php if(is_product()): ?>
                   <h1>Product</h1>
                  <?php else: ?>
                   <h1>Blog Single</h1>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
    
    
  </header>