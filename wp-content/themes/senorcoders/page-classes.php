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
      <div class="row">
       <?php    include_once get_template_directory() . '/clubReady/api.php';
                $ClubReady = new ClubReady();
             $date_format = 'Y-m-d\TH:i:s\Z'; 

               $today = mktime();
                 $d = date('d', $today);
               $m = date('m', $today);
               $y = date('Y', $today);
                 $sevendays = gmdate($date_format, mktime(0, 0, 0, $m, ($d + 7), $y));
                $allClasses = $ClubReady->getClasses($sevendays); 
                
               //var_dump($allClasses);
        
        ?>
      <?php  if(!empty($allClasses)): ?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Instructor</th>
      <th scope="col">Free Spots</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allClasses as $class) { ?>
    <tr>
      <th scope="row"><?php echo $class->Date ?></th>
      <td><?php echo $class->Title ?></td>
      <td><?php echo $class ->StartTime ?></td>
      <td><?php echo $class->EndTime ?></td>
       <td><?php echo $class->InstructorFirstName . ' ' . $class->InstructorLastName ?></td>
       <td><?php echo $class->FreeSpots ?></td>
    </tr>
<?php } ?>
 
  </tbody>
</table>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php get_footer(); ?>