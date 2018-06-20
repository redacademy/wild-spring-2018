<?php
/**
 * Template Name: activity Page
 *
 * @package WAV_Starter_Theme
 */

get_header(); ?>
<section>
    <div class="carousel-main">
        <?php $loop = CFS()->get( 'activity_image_loop' );
        foreach ( $loop as $row ) {?>
            <div class="carousel-cell">
                 <img src="<?php echo $row['activity_image']; ?>">
            </div>
        <?php } ?>
    </div>
       
    <div class="carousel-nav" >
        <?php $loop = CFS()->get( 'activity_image_loop' );
            foreach ( $loop as $row ) {?>
                <div class="carousel-cell">
                    <img src="<?php echo $row['activity_image']; ?>">
                </div>
        <?php } ?>
    </div>

   <h3><?php echo $row['description']; ?></h3>
    <p><?php echo $row['location']; ?></p>

</section>
<?php get_footer(); ?>
